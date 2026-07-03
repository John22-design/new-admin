<?php

use App\Http\Controllers\website\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use Spatie\Honeypot\ProtectAgainstSpam;

// Main Page Route
Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics')->middleware('auth');

// layout
Route::middleware('auth')->group(function () {
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

    // pages
    Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
    Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
    Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
    Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
    Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');
});

// authentication
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/auth/login', [LoginBasic::class, 'index'])->name('auth-login');
Route::post('/auth/login', [LoginBasic::class, 'login'])->name('auth-login-submit');
Route::post('/auth/logout', [LoginBasic::class, 'logout'])->name('auth-logout');
// Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
// Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// Contact form submission (public route with rate limiting and spam protection)
Route::post('/contact/send', [ContactController::class, 'send'])
    ->middleware(['throttle:5,1', ProtectAgainstSpam::class])
    ->name('contact.send');

// Public Blog pages
Route::get('/blog', [BlogPostController::class, 'publicIndex'])->name('blog');
Route::get('/blog/{slug}', [BlogPostController::class, 'show'])->name('blog.single');
