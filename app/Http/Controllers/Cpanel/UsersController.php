<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Country;
use Yajra\Datatables\Facades\Datatables;

class UsersController extends Controller
{


    public function index()
    {
        return view('cpanel.manage-users.index');
    }

    public function data()
    {
        $users = User::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="'.url('cpanel/manage-users/edit').'/' . $user->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);


//        return \Datatables::of(User::query())->make(true);
    }



    public function edit($id)
    {
        $user = User::findOrFail($id);

        $countries = Country::pluck('code','id');
        return view('cpanel.manage-users.edit',compact('user','countries'));
    }

}
