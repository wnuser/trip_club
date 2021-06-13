<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ajaxController extends Controller
{

    public function addlikes(Request $request)
    {
       //  aprint($request->all());
        $answerId  = $request->answerId;
        $userId    = Auth::user()->id;
        $isLiked   = 0;

        $existLike   = \App\Models\likes::whereUserId($userId)->whereAnswerId($answerId)->first();
        if($existLike) {
            $removeLike  = \App\Models\likes::whereUserId($userId)->whereAnswerId($answerId)->delete();
        } else {
            $data['answer_id']  = $answerId;
            $data['user_id']    = $userId;
            $data['likes']      = 1;

            $like = new \App\Models\likes;
            $like->fill($data)->save();
            $isLiked = 1;

        }

        $totalLikes   = \App\Models\likes::whereAnswerId($answerId)->whereUserId($userId)->count();
        $updateAnswer  = \App\Models\answers::whereId($answerId)->first();
        $updateAnswer->likes  = $totalLikes;
        $updateAnswer->save();
        $response  = [
            $totalLikes, $isLiked
        ];
        return $response;
    }










    //
    /**
     * function for getting states on the basis of country
     */
    public function getState(Request $request)
    {
        // aprint($request->all());
        $countryId   =  $request->countryId;
        $states      =  \App\state::whereCountryId($countryId)->get();
        $html        =  '';
        foreach ($states as $key => $value) {
            # code...
            $html.=  '<option value="'.$value->state_id.'">'.$value->state_name.'</option>';
        }

        return $html;
    }

    /**
     * function for getting city on the basis of state 
     */
    public function getCity(Request $request)
    {
        $stateId    =   $request->stateId;
        $cities     =   \App\city::whereStateId($stateId)->get();
        $html       =   '';
        foreach ($cities as $key => $value) {
            # code...
            $html.= '<option value="'.$value->city_id.'">'.$value->city_name.'</option>';
        }

        return $html;
    }
}
