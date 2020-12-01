<?php

namespace App\Http\Controllers;

use App\adsHistory;
use Illuminate\Http\Request;

class AdsHistoryController extends Controller
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
     * @param  \App\adsHistory  $adsHistory
     * @return \Illuminate\Http\Response
     */
    public function show($adId)
    {
        //
        $adsHistory    =   adsHistory::whereAdId($adId)->get();
        return view('admin.ads.history', compact('adsHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adsHistory  $adsHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(adsHistory $adsHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adsHistory  $adsHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adsHistory $adsHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adsHistory  $adsHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(adsHistory $adsHistory)
    {
        //
    }
}
