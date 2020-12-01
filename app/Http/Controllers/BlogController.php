<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\blogCategory;
use DB;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * store user blog
     */

     public function addUseBlog(Request $request)
     {
        $request->validate([
            'user_name'    => 'required',
            'title'        => 'required',
            'category'     => 'required',
            'image'        => 'required',
            'Description'  => 'required'
        ]);

        $Blog   =  new Blog();
        if ($request->image) {
            $image          = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('Images/uploads', $image_new_name);
        }

        $Blog->title           =  $request->title;
        $Blog->user_name       =  $request->user_name;
        $Blog->category        =  $request->category;
        $Blog->image           =  $image_new_name;
        $Blog->Description     =  $request->Description;
        $Blog->created_by      =  0;
        $Blog->save();

        return back()->with('success', 'Blog created successfully');
     }

    public function blogUpload(Request $request)
    {
        $input        = $request->all(); 
        $CKEditor     = Input::get('CKEditor');
        $funcNum      = Input::get('CKEditorFuncNum');
        $message      = $url = '';

        if (Input::hasFile('upload')) {

            $file    = Input::file('upload');

            if ($file->isValid()) {

                    $filename = $file->getClientOriginalName();
                    $image_new_name = time().$filename;

                    $file->move('Images/uploads', $image_new_name);
                    $url = asset('/Images/uploads/'. $image_new_name);

            } else {

                $message = 'An error occured while uploading the file.';
            }

        } else {

            $message = 'No file uploaded.';
        }

        $response = "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message')</script>";
        @header('Content-type: text/html; charset=utf-8');
        echo $response;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        
        $increaseClicks  =   DB::table('blogs')->where('slug', $slug)->increment('clicks');
        $blogData        =   Blog::with(['comment'])->where('slug', $slug)->first();
        $blogCategory    =   $blogData['category'];
        $similarBlogs    =   Blog::where('slug', '!=', $slug)->whereCategory($blogCategory)->get();    
        $popularBlogs    =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.POPULAR'))->get();
        $trendingBlogs   =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.TRENDING'))->get();
        $categories      =   blogCategory::get();
        $trendingCount   =   $trendingBlogs->count();

        $supperArray     =  array();
        $subArray        =  array();
        $count           =  0;
       
        foreach ($trendingBlogs as $key => $value) {

            $subArray[$key]   =  $value->toArray();
            $count++;
            if($count%4 == 0)
            {
                $supperArray[$count]  = $subArray;
                $subArray             = array();
            } 
            else {
                if($count == $trendingCount){
                $supperArray[$count]  = $subArray;
                }
            }
        }

        return view('single', compact('blogData', 'similarBlogs', 'popularBlogs','categories','supperArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
