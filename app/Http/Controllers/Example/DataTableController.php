<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use Yajra\Datatables\Datatables;

class DataTableController extends Controller
{
    public function showDatatables()
    {
        return view('example.datatables');
    }


    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
