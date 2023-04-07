<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $destinations = Destination::orderBy('total_places', 'desc')->limit(6)->get();
        $packages = Package::with('destination')->orderBy('id', 'desc')->limit(6)->get();
        $blogs = Post::orderBy('id', 'desc')->limit(6)->get();
        return view('frontend.home', [
            'sliders' => $sliders,
            'destinations' => $destinations,
            'packages' => $packages,
            'blogs' => $blogs,
        ]);
    }
}
