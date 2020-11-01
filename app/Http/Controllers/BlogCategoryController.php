<?php

namespace App\Http\Controllers;

use App\blogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Blog;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data     = blogCategory::get();
        return view('admin.category.index', compact('data'));
    }

    /**
     * all categories  to show on frontend
     */
    public function allCategories()
    {
        $categories   =  blogCategory::get();
        return view('allCategory', compact('categories'));
    }

    /**
     * showing all blogs related to single category
     */
    public function categoryBlogs($catId)
    {
        $Blogs           =    Blog::whereCategory($catId)->get();
        $categoryData    =    blogCategory::whereId($catId)->first();
        $categories      =   blogCategory::get();
        $trendingBlogs   =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.TRENDING'))->get();


        return view('listing', compact('Blogs', 'categoryData', 'categories', 'trendingBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'   => 'required',
            'image'  => 'required'
        ]);
        if ($request->image) {
            $image          = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('Images/categories', $image_new_name);
        }

        $blogCategory        =   new blogCategory();
        $blogCategory->name  =   $request->name;
        if($request->image):
            $blogCategory->image =   $image_new_name;
        endif;

        try {
            //code...
            $blogCategory->save();

        } catch (\Throwable $th) {
            //throw $th;
        }
        return back()->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(blogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(blogCategory $blogCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogCategory $blogCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(blogCategory $blogCategory)
    {
        //
    }
}
