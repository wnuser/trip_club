<?php

namespace App\Http\Controllers;

use App\frontSlider;
use Illuminate\Http\Request;
use App\blogCategory;

class FrontSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data     = frontSlider::get();
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories    =   blogCategory::get();
        return view('admin.slider.create', compact('categories'));
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
            'image'        => 'required',
            'hyper_link'   => 'required',
            'title'        => 'required',
            'category'     => 'required'
        ]);
        if ($request->image) {
            $image          = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('Images/uploads', $image_new_name);
        }

        $frontSlider              =   new frontSlider();
        $frontSlider->image       =   $image_new_name;
        $frontSlider->hyper_link  =   $request->hyper_link;
        $frontSlider->title       =   $request->title;
        $frontSlider->category    =   $request->category;

       
        try {
            //code...
            $frontSlider->save();

        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
        return back()->with('success', 'Slider Image Added  Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\frontSlider  $frontSlider
     * @return \Illuminate\Http\Response
     */
    public function show(frontSlider $frontSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\frontSlider  $frontSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(frontSlider $frontSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\frontSlider  $frontSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontSlider $frontSlider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\frontSlider  $frontSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $deleteData    =  frontSlider::whereId($id)->delete();

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());

        }
        
        return back()->with('success', 'Slider Image Deleted Successfully');
    }
}
