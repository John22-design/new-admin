<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Testimonials::query())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <button onclick="editTestimonial(' . $row->id . ')" class="btn btn-sm btn-primary">
                            <i class="bx bx-edit"></i> Edit
                        </button>
                        <button onclick="deleteTestimonial(' . $row->id . ')" class="btn btn-sm btn-danger">
                            <i class="bx bx-trash"></i> Delete
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('content.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'profession' => 'required|string|max:255',
                'comment' => 'required|string|max:1000',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle file upload
            $profileImagePath = null;
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $profileImagePath = $image->storeAs('testimonials', $imageName, 'public');
            }

            // Create testimonial
            $testimonial = Testimonials::create([
                'customer_name' => $validated['customer_name'],
                'profession' => $validated['profession'],
                'comment' => $validated['comment'],
                'profile_image' => $profileImagePath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Testimonial created successfully!',
                'data' => $testimonial
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
     * Display the specified resource.
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $testimonial = Testimonials::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $testimonial
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Testimonial not found.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the testimonial
            $testimonial = Testimonials::findOrFail($id);

            // Validate the request
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'profession' => 'required|string|max:255',
                'comment' => 'required|string|max:1000',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle file upload
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($testimonial->profile_image) {
                    Storage::disk('public')->delete($testimonial->profile_image);
                }

                $image = $request->file('profile_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $profileImagePath = $image->storeAs('testimonials', $imageName, 'public');
                $validated['profile_image'] = $profileImagePath;
            }

            // Update testimonial
            $testimonial->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Testimonial updated successfully!',
                'data' => $testimonial
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $testimonial = Testimonials::findOrFail($id);

            // Delete image if exists
            if ($testimonial->profile_image) {
                Storage::disk('public')->delete($testimonial->profile_image);
            }

            $testimonial->delete();

            return response()->json([
                'success' => true,
                'message' => 'Testimonial deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
