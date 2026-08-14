<?php

use App\Http\Controllers\website\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use Spatie\Honeypot\ProtectAgainstSpam;

use App\Http\Controllers\UserController;

// Main Page Route
Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics')->middleware('auth');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Users Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // website
    Route::get('/website/testimonials', [TestimonialsController::class, 'index'])->name('website-testimonials');
    Route::post('/website/testimonials', [TestimonialsController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{id}/edit', [TestimonialsController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [TestimonialsController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [TestimonialsController::class, 'destroy'])->name('testimonials.destroy');

    // blog posts management
    Route::get('/website/blog-posts', [BlogPostController::class, 'index'])->name('website-blog-posts');
    Route::post('/website/blog-posts', [BlogPostController::class, 'store'])->name('blog-posts.store');
    Route::get('/blog-posts/{id}/edit', [BlogPostController::class, 'edit'])->name('blog-posts.edit');
    Route::put('/blog-posts/{id}', [BlogPostController::class, 'update'])->name('blog-posts.update');
    Route::delete('/blog-posts/{id}', [BlogPostController::class, 'destroy'])->name('blog-posts.destroy');
});

// authentication
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/auth/login', [LoginBasic::class, 'index'])->name('auth-login');
Route::post('/auth/login', [LoginBasic::class, 'login'])->name('auth-login-submit');
Route::post('/auth/logout', [LoginBasic::class, 'logout'])->name('auth-logout');

// Contact form submission (public route with rate limiting and spam protection)
Route::post('/contact/send', [ContactController::class, 'send'])
    ->middleware(['throttle:5,1', ProtectAgainstSpam::class])
    ->name('contact.send');

// Public Blog pages
Route::get('/blog', [BlogPostController::class, 'publicIndex'])->name('blog');
Route::get('/blog/{slug}', [BlogPostController::class, 'show'])->name('blog.single');

