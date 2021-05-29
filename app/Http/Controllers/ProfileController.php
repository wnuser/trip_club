<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Lang;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $userInfo   =   \App\User::with(['countryRelation','stateRelation', 'cityRelation'])->whereId(Auth::user()->id)->first();
        return view('profile', compact('userInfo'));

    }

     /**
     * Update the specified resource in storage.
     * @param User $user
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function uploadImage(Request $request){

        try {

            $request->validate([
                'uploadProfile' => 'required|image|'
             ]);
             $storagePath = config('constants.avatarPath');

             $image       = $request->file('uploadProfile');
             $user_id     = $request->user_id;

            $image_new_name = time().$image->getClientOriginalName();
            $image->move($storagePath, $image_new_name);

             $update      = User::whereId($user_id)->update(['profile_pic' => $image_new_name]);
             return back()->with('success', Lang::get('core.successAvatar'));

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
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
    public function update(Request $request)
    {
        //
        // aprint($request->all());
        $id   = $request->id;
        $user  = \App\User::whereId($id)->first();
        $data  = $request->all();
        unset($data['id']);

        $user->fill($data)->save();

        return back()->with('success', 'Profile updated successfully');
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
