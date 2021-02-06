<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\blogCategory;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $searchKeywords  =   $request->search;
        $result          =   Blog::where('title','LIKE','%'.$searchKeywords.'%')->get();
        $trendingBlogs   =   Blog::orderBy('id', 'desc')->whereFrontCategory(config('constants.FRONTCATEGORY.TRENDING'))->get();
        $trendingCount   =   $trendingBlogs->count();
        $categories      =   blogCategory::get();

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
        return view('search', compact('result', 'supperArray', 'categories', 'searchKeywords'));

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
