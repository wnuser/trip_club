<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\Signup;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['isMentor'])) {
            $mentorType   = $data['mentor_type'];
            $userType     = config('role.ROLES.MENTOR.TYPE');
            
        } else {
            $mentorType   = false;
            $userType     = config('role.ROLES.MENTEE.TYPE');
        }

        $createUser =  User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'user_type'  => $userType,
            'mentor_type'=> $mentorType,
            'password'   => Hash::make($data['password']),
        ]);

        
            $root_url                 =  url('/');
            $emailData['name']        =  $data['name'];
            $emailData['email']       =  $data['email'];
            $emailData['domain']      =  ($mentorType) ? config('role.MENTORSTITLE.'.$mentorType) : '';
            $emailData['url']         =  $root_url.'/login';
            $emailData['profile_pic'] = 'healthlogo.png';
            $sendMail                 =  Mail::to($data['email'])->send(new Signup($emailData));

            
            return $createUser;
        

    }
}
