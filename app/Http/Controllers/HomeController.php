<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $level = Auth::user()->level;
            return view('dashboard.dashboard');

        // if($level == 1) {
            // return view('dashboard.dashboard');
        // }else if ( $level == 2){
            // return redirect('/');
        // }
    }
}
