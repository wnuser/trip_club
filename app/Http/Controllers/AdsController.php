<?php

namespace App\Http\Controllers;

use App\ads;
use Illuminate\Http\Request;
use App\adsHistory;
use Illuminate\Support\Str;
use DB;
use Redirect;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allAds   =  ads::get();
        return view('admin.ads.index', compact('allAds'));
    }

    /**
     * clicks counts for ads
     */
    public function clicksCounts($id)
    {
        
        $data            =   ads::whereId($id)->first();
        $increaseClicks  =   DB::table('ads')->where('id',$id)->increment('clicks');

        return Redirect::to($data['hyper_link']);
    }

    /**
     * stop Running Ad
     */
    public function stopRunningAd($id)
    {

       $ads                 = ads::find($id);
       $adHistory           = $ads->toArray();
       $adHistory['ad_id']  = $adHistory['id'];
       unset($adHistory['id']);
       unset($adHistory['created_at']);
       unset($adHistory['updated_at']);
       unset($adHistory['deleted_at']);

       $adHistory['end_date'] = date('Y-m-d');
       $adsHistorymodel   = new adsHistory();
       $adsHistorymodel->fill($adHistory)->save();
       $ads->company_name = '';
       $ads->image        = '';
       $ads->hyper_link   = '';
       $ads->start_date   = null;
       $ads->clicks       = 0;
       $ads->isRunning    = 0;
       $ads->save();

       return back()->with('success', 'This Advertisment is Stopped Successfully');
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
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id                   = $request->id;
        $ads                  = ads::find($id);
        $ads->company_name    = $request->company_name;
        $ads->hyper_link      = $request->hyper_link;
        $ads->isRunning       = 1;
        $ads->start_date      = date('Y-m-d');
        if ($request->image) {
            $image          = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('Images/uploads', $image_new_name);
        }
        $ads->image          = $image_new_name;
        $ads->save();
        return back()->with('success', 'Ad Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(ads $ads)
    {
        //
    }
}
