<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajaxController extends Controller
{
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
