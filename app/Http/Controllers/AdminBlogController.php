<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blogCategory;
use App\Blog;
use Illuminate\Support\Str;
use App\Scopes;

use Auth;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data         =    Blog::get();
        return view('admin.blogs.index', compact('data'));
    }

    /**
     * getting users blogs those are from user side 
     */
    public function getUsersblogs()
    {
        $blogs     =   Blog::where('isFromuser', 1)->withoutGlobalScope('App\Scopes\UserBlogScope')->get();
        return view('admin.usersBlog.index', compact('blogs'));
    }

    /**
     * update status of blog as it is read by admin and downloaded respective data
     */
    public function adminDone($id)
    {
        $blog      =   Blog::whereId($id)->withoutGlobalScope('App\Scopes\UserBlogScope')->first();
        $blog->isAdmindone   = 1;
        $blog->save();

        return back()->with("success", 'Status Updated Successfully');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories      =   blogCategory::get();
        return view('admin.blogs.create', compact('categories'));
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

        try {
            //code...
            $Blog->title           =  $request->title;
            $Blog->user_name       =  $request->user_name;
            $Blog->category        =  $request->category;
            $Blog->image           =  $image_new_name;
            $Blog->Description     =  $request->Description;
            $Blog->front_category  =  config('constants.FRONTCATEGORY.DEFAULT');
            $Blog->meta_tag        =  $request->meta_tag;
            $Blog->meta_description=  $request->meta_description;
            $Blog->alt_description =  $request->alt_description;
            $Blog->created_by      =  config('role.ROLES.ADMIN.TYPE');
            $Blog->slug            =  str_slug($request->title).time();
            $Blog->save();
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
            // exit;
        }

        

        return back()->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blogData       =    Blog::whereId($id)->first();
        return view('admin.blogs.edit', compact('blogData'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // aprint($request->all());
        $blogId      =  $request->id;
        $blogData    =  Blog::whereId($blogId)->first();
        $data        =  $request->all();


        if ($request->image) {
            echo "yes";
            $image          = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('Images/uploads', $image_new_name);
            $data['image']   = $image_new_name;

        }

        // aprint($blogData);
        try {
            //code...
            $blogData->fill($data)->save();

        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }

        // exit;
        return back()->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       

        try {
            //code...
            $deleteBlog    =   Blog::whereId($id)->delete();

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }

        return back()->with('success', 'Blog has been deleted Successfully');

    }

    /**
     * change front Category
     */
    public function changeFrontcategory(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());

        $blog                   =   Blog::find($request->blogId);
        $blog->front_category   =   $request->front_category;
        $blog->save();

        return back()->with('success', 'Front Category Updated Successfully');
    }
}
