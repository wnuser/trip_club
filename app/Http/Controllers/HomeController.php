<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\frontSlider;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $frontSlider    =   frontSlider::get();
        $blogs          =   Blog::get();
        $recentBlogs    =   Blog::orderBy('id', 'desc')->take(3)->get();
        $defaultBlogs   =   Blog::orderBy('id', 'desc')->skip(3)->take(5)->get();
        $popularBlogs   =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.TRENDING'))->get();


        echo "<pre>";
        print_r($popularBlogs->toArray());
        exit;

        return view('welcome', compact('frontSlider', 'blogs'));
    }
}
