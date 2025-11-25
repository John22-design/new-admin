<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonials;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::latest()->get();
        return view('website.index', compact('testimonials'));
    }
}
