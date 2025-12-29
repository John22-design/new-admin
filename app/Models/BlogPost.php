<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'read_time',
        'is_featured',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'author_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug if not provided
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);

                // Ensure unique slug
                $originalSlug = $post->slug;
                $count = 1;
                while (static::where('slug', $post->slug)->exists()) {
                    $post->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }

    /**
     * Get the author of the blog post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the featured image URL.
     */
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-blog.jpg');
    }

    /**
     * Get formatted published date.
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('F d, Y') : $this->created_at->format('F d, Y');
    }

    /**
     * Get short date format.
     */
    public function getShortDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('M d, Y') : $this->created_at->format('M d, Y');
    }

    /**
     * Scope for published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope for featured posts.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordering by published date.
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc');
    }
}
