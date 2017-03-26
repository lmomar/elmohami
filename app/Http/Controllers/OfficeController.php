<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

//    protected $redirectTo = 'office';


    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.master_page');
    }

    protected function guard()
    {
        return Auth::guard('office');
    }
}
