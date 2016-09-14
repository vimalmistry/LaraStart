<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        flash('hello testing');

//        \Auth::user()->assignRole(2,450);
//        \Auth::user()->hasPermission('manage.adminPanel');

//        dd($res);
        return view('home');
    }
}
