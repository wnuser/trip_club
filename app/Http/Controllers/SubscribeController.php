<?php

namespace App\Http\Controllers;

use App\subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscribeData   =   subscribe::get();
        return view('admin.subscribers.index', compact('subscribeData'));
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
        // echo "<pre>";
        // print_r($request->all());

        $data     = $request->all();
        unset($data['_token']);

        $subscribe    = new subscribe();
        $subscribe->fill($data)->save();

        return back()->with('success', 'You have Subscribe Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        try {
            //code...
            $subscribe   =  subscribe::whereId($id)->delete();

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success', $th->getMessage());

        }

        return back()->with('success', 'Subscribers has been deleted');

    }
}
