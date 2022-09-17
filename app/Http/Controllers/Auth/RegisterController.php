<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserPartnerPreference;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required'],
            'gender' => ['required'],
            'annual_income' => ['required', 'numeric'],
            'occupation' => ['required', 'string'],
            'family_type' => ['required', 'string'],
            'manglik' => ['required'],
            'partner_expected_income' => ['required', 'string'],
            'partner_occupation' => ['required'],
            'partner_family_type' => ['required'],
            'partner_manglik' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'annual_income' => $data['annual_income'],
            'occupation' => $data['occupation'],
            'family_type' => $data['family_type'],
            'manglik' => $data['manglik'],
        ]);

        if ($user) {
            $partnerData = [
                'user_id' => $user->id,
                'expected_income' => $data['partner_expected_income'],
                'occupation' => $data['partner_occupation'],
                'family_type' => $data['partner_family_type'],
                'manglik' => $data['partner_manglik'],
            ];
            UserPartnerPreference::create($partnerData);
        }
        return $user;
    }

    public function redirectToGoogle()  
    {  
        return Socialite::driver('google')->redirect();  
    }  
  
    public function handleGoogleCallback()  
    {  
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('home');
       
            }else{
                $newUser = User::create([
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('home');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        } 
    } 
}
