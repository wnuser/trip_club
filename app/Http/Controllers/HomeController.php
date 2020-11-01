<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\frontSlider;
use App\Blog;
use App\blogCategory;

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

        $frontSlider     =   frontSlider::get();
        $recentBlogs     =   Blog::orderBy('id', 'desc')->take(3)->get();
        $defaultBlogs    =   Blog::orderBy('id', 'desc')->skip(3)->take(2)->get();
        $trendingBlogs   =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.TRENDING'))->get();
        $popularBlogs    =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.POPULAR'))->get();
        $categories      =   blogCategory::get();

        return view('welcome', compact('frontSlider', 'recentBlogs', 'defaultBlogs', 'trendingBlogs', 'popularBlogs', 'categories'));
    }
}
