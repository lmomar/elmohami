<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = 'office/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:office', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('office.login');
    }

    protected function guard()
    {
        return Auth::guard('office');
    }

    public function login(Request $request)
    {
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        
        if (auth()->guard('office')->attempt(['user_name' => $user_name, 'password' => $password ]))
        {
            
            Auth::login($this->guard('office')->user());
            return redirect()->intended(route('dashboard'));
        }
        else
        {
            $errors = [$this->username() => trans('auth.failed')];

            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }
    }

}
