<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\Subscriber;
use itstep\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $email = \Auth::user()->email;
        return view('home',['userEmail'=>$email]);
    }

    public function logout()
    {
        \Auth::logout();
        return view('auth/login');
    }

}
