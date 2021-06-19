<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ajaxController extends Controller
{

     public function addLikestoPost(Request $request)
     {
        $data['user_id']  = Auth::user()->id;
        $data['post_id']  = $request->postId;
        $data['likes']    = 1;


        $isLikeExists  = \App\Models\Postlikes::whereUserId(Auth::user()->id)->wherePostId($request->postId)->exists();
        if($isLikeExists)
        {
            $removeLike  = \App\Models\Postlikes::whereUserId(Auth::user()->id)->wherePostId($request->postId)->delete();
        }
        else 
        {
            $insetData  = \App\Models\Postlikes::insert($data);
        }

        $count = \App\Models\Postlikes::wherePostId($request->postId)->count();
        return $count;
     }



    /**
     * function for preparing user details for show in profile modal 
     */
    public function userDetails(Request $request)
    {
        $userId      = $request->userId;
        $userInfo    = \App\User::with(['countryRelation','stateRelation', 'cityRelation'])->whereId($userId)->first();
        $years       = ($userInfo->experience == 1) ? 'year' : 'years';
        $coverImg    = '\Images\cover-mentors.jpg';
        $imageSrc    =  config('constants.image.src') ;
        $userSrc     =  ($userInfo->profile_pic) ? $userInfo->profile_pic : false;
        $userImg     =  ($userInfo->profile_pic) ?  $imageSrc : '\Images\user_image\userIcon.png';
        if($userInfo->profile_pic)
        {
            $userImg   = $userImg.$userSrc;
        }
        $name        = $userInfo->name;
        $education   = $userInfo->education;
        $about       = $userInfo->about;
        $officeAddress = $userInfo->office_address;
        $countryName      = ($userInfo->countryRelation) ? $userInfo->countryRelation->country_name : false;
        $stateName        = ($userInfo->stateRelation) ? $userInfo->stateRelation->state_name.',' : false;
        $cityName         = ($userInfo->cityRelation) ? $userInfo->cityRelation->city_name.',' : false;
        $role             =  config('role.MENTORSTITLE.'.$userInfo->mentor_type);

        

        $html    = '<div class="about-card">
                            <div class="cover-bg">
                                <img src="'.$coverImg.'" alt="cover-bg" class="img-fluid">
                            </div>
                        <div class="profile-box">
                            <a class="profile-popup" href="#">
                                <img src="'.$userImg.'" alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="about-body">
                            <div class="button-strip">
                                <a href=""  data-toggle="modal" class="btn btn-small"></a>                                
                            </div>
                            <div class="about-info-box">
                            <h4 class="mb-0">'.$name.'  </h4>
                            <p><span> </span> </p>
                            <h6> 
                                '.$cityName.' '.$stateName.' '.$countryName.'                          
                            </h6>
                            <p> <span>'.$role.'</span>  </p>
                            </div>
                        </div>
                        </div>
                        <hr>
                    <div class="about-info-sec">
                        <h5> <i class="fas fa-school"></i> Education</h5>
                        <p>'.$education.'</p>
                    </div>

                    <hr>

                    <div class="about-info-sec">
                        <h5> <i class="fas fa-info-circle"></i> About</h5>
                        <p>'.$about.'</p>
                    </div>
                    <hr>

                    <div class="about-info-sec">
                        <h5> <i class="fas fa-map-marked"></i> Office Address </h5>
                        <p>'.$officeAddress.'</p>
                    </div>

                    </div>';
        return $html;            
    
        }











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
