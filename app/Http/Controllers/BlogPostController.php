<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts for admin (DataTables).
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(BlogPost::with('author')->latest())
                ->addIndexColumn()
                ->addColumn('featured_image_preview', function ($row) {
                    if ($row->featured_image) {
                        return '<img src="' . asset('storage/' . $row->featured_image) . '" alt="' . $row->title . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">';
                    }
                    return '<span class="badge bg-secondary">No Image</span>';
                })
                ->addColumn('status_badge', function ($row) {
                    $badges = [
                        'draft' => 'secondary',
                        'published' => 'success',
                        'archived' => 'warning'
                    ];
                    return '<span class="badge bg-' . ($badges[$row->status] ?? 'secondary') . '">' . ucfirst($row->status) . '</span>';
                })
                ->addColumn('featured_badge', function ($row) {
                    return $row->is_featured
                        ? '<span class="badge bg-primary">Featured</span>'
                        : '<span class="badge bg-light text-dark">Regular</span>';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="editBlogPost(' . $row->id . ')">
                                        <i class="bx bx-edit me-1"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="' . route('blog.single', $row->slug) . '" target="_blank">
                                        <i class="bx bx-show me-1"></i> View
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteBlogPost(' . $row->id . ')">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    ';
                })
                ->rawColumns(['featured_image_preview', 'status_badge', 'featured_badge', 'action'])
                ->make(true);
        }
        return view('content.website.blog-posts');
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'nullable|string|max:500',
                'content' => 'nullable|string',
                'category' => 'nullable|string|max:100',
                'is_featured' => 'boolean',
                'status' => 'required|in:draft,published,archived',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            ]);

            // Handle featured image upload
            if ($request->hasFile('featured_image')) {
                $image = $request->file('featured_image');
                $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
                $validated['featured_image'] = $image->storeAs('blog-posts', $imageName, 'public');
            }

            // Set author_id to current user
            $validated['author_id'] = auth()->id();

            // Explicitly cast is_featured boolean
            $validated['is_featured'] = $request->boolean('is_featured');

            // Auto-generate slug from title
            $validated['slug'] = Str::slug($validated['title']);

            // Create blog post
            $blogPost = BlogPost::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Blog post created successfully!',
                'data' => $blogPost
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit($id)
    {
        try {
            $blogPost = BlogPost::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $blogPost
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Blog post not found.'
            ], 404);
        }
    }

    /**
     * Update the specified blog post.
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the blog post
            $blogPost = BlogPost::findOrFail($id);

            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'nullable|string|max:500',
                'content' => 'nullable|string',
                'category' => 'nullable|string|max:100',
                'is_featured' => 'boolean',
                'status' => 'required|in:draft,published,archived',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            ]);

            // Handle featured image upload
            if ($request->hasFile('featured_image')) {
                // Delete old image if exists
                if ($blogPost->featured_image) {
                    Storage::disk('public')->delete($blogPost->featured_image);
                }

                $image = $request->file('featured_image');
                $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
                $validated['featured_image'] = $image->storeAs('blog-posts', $imageName, 'public');
            }

            // Update slug if title changed
            if ($request->title !== $blogPost->title) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            // Explicitly cast is_featured boolean
            $validated['is_featured'] = $request->boolean('is_featured');

            // Update blog post
            $blogPost->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Blog post updated successfully!',
                'data' => $blogPost
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified blog post.
     */
    public function destroy($id)
    {
        try {
            $blogPost = BlogPost::findOrFail($id);

            // Delete featured image if exists
            if ($blogPost->featured_image) {
                Storage::disk('public')->delete($blogPost->featured_image);
            }

            $blogPost->delete();

            return response()->json([
                'success' => true,
                'message' => 'Blog post deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display blog listing page (public).
     */
    public function publicIndex()
    {
        $featuredPost = BlogPost::published()->featured()->latest()->first();
        $posts = BlogPost::published()
            ->when($featuredPost, function ($query) use ($featuredPost) {
                return $query->where('id', '!=', $featuredPost->id);
            })
            ->latest()
            ->get();

        return view('website.blog', compact('featuredPost', 'posts'));
    }

    /**
     * Display a single blog post (public).
     */
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->published()->firstOrFail();

        // Get related posts (same category, excluding current post)
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->when($post->category, function ($query) use ($post) {
                return $query->where('category', $post->category);
            })
            ->latest()
            ->limit(2)
            ->get();

        return view('website.blog-single', compact('post', 'relatedPosts'));
    }
}
