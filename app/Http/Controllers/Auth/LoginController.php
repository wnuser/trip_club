<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     /**
     * fucntion for redirect user on the basis of their roles 
    */
    protected function redirectTo()
    {
        if (auth()->user()->user_type == config('role.ROLES.ADMIN.TYPE')) {
            return route('dashboard');
        } elseif (auth()->user()->user_type == config('role.ROLES.MENTOR.TYPE')) {
            return route('profile');
        } elseif (auth()->user()->user_type == config('role.ROLES.MENTEE.TYPE')) {
            return route('profile');
        } else{
            return route('profile');
        }
    }
}
