<?php

namespace App\Http\Controllers;

use App\blogQuery;
use Illuminate\Http\Request;

class BlogQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogQueries    =   blogQuery::get();
        return view('admin.blogqueries.index', compact('blogQueries'));
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

        $data   =  $request->all();
        $blogQuery  = new blogQuery();
        $blogQuery->fill($data)->save();

        return back()->with('success', 'Query Submitted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blogQuery  $blogQuery
     * @return \Illuminate\Http\Response
     */
    public function show(blogQuery $blogQuery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blogQuery  $blogQuery
     * @return \Illuminate\Http\Response
     */
    public function edit(blogQuery $blogQuery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blogQuery  $blogQuery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogQuery $blogQuery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blogQuery  $blogQuery
     * @return \Illuminate\Http\Response
     */
    public function destroy($blogId)
    {
        //
        try {
            //code...
            $blogQuery   =  blogQuery::whereId($blogId)->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success', $th->getMessage());

        }

        return back()->with('success', 'Blog Query has been deleted');
    }
}
