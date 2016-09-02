<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Yajra\Datatables\Datatables;

class ProfileController extends Controller
{


    public function showProfile(Request $request)
    {
        return \Auth::user();
    }


    public function showDatatables()
    {
        return view('data');
    }


    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
