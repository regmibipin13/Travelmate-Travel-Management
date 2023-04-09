<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $destinations = Destination::orderBy('total_places', 'desc')->limit(6)->get();
        $packages = Package::with('destination')->orderBy('id', 'desc')->limit(6)->get();
        $blogs = Post::available()->orderBy('id', 'desc')->limit(6)->get();
        return view('frontend.home', [
            'sliders' => $sliders,
            'destinations' => $destinations,
            'packages' => $packages,
            'blogs' => $blogs,
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function services()
    {
        return view('frontend.service');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function packages()
    {
        $packages = Package::with('destination')->orderBy('id', 'desc')->paginate(20);
        return view('frontend.packages', compact('packages'));
    }

    public function destinations()
    {
        $destinations = Destination::orderBy('id', 'desc')->paginate(20);
        return view('frontend.destinations', compact('destinations'));
    }

    public function blogs()
    {
        $blogs = Post::available()->orderBy('id', 'desc')->paginate(20);
        return view('frontend.blogs', compact('blogs'));
    }

    public function postDetail($slug)
    {
        $blog = Post::where('slug', $slug)->firstOrFail();
        $blog->load(['post_category', 'tags']);
        return view('frontend.blog_single', compact('blog'));
    }

    public function packageDetail(Package $package)
    {
        $package->load(['package_type', 'destination', 'plans']);
        return view('frontend.package_detail', compact('package'));
    }

    public function book(Package $package, Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'from_date' => 'required',
            'total_people' => 'required',
        ]);

        $booking = Booking::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'from_date' => $request->from_date,
            'total_people' => $request->total_people,
            'total_price' => $request->total,
            'package_id' => $package->id,
            'status' => Booking::STATUS_SELECT['pending']
        ]);

        return response()->json(['status' => 'success', 'message' => 'Booking created successfully']);
    }

    public function contactMail(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to('regmibipin13@gmail.com')->send(new ContactUsMail($sanitized));

        return redirect()->back()->with('success', 'Your Query has been sent successfully');
    }
}
