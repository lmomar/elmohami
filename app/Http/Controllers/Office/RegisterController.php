<?php

namespace App\Http\Controllers\Office;

use App\Office;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showRegistrationForm()
    {
        return view('office.register');
    }


    public function __construct()
    {
//        $this->middleware('auth:office');
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
            'code' => 'required|min:6|unique:offices',
            'email' => 'required|email|max:255|unique:offices',
            'user_name' => 'required|max:255|unique:offices',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Office::create([
            'code' => $data['code'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
