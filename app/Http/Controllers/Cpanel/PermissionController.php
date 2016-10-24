<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Logic\Design\CrudInterface;
use App\Permission;

class PermissionController extends Controller implements CrudInterface
{


    public function index()
    {
        // TODO: Implement index() method.

        return view('cpanel.manage-permissions.index');
    }

    public function data()
    {
        return \Datatables::of(Permission::query())->make(true);
    }

    //GET
    public function create()
    {

        \Form::component('formField', 'components.formField', ['name','label', 'value'=>null, 'attributes']);


        return view('cpanel.manage-permissions.create');

    }
    //POST
    public function store(Request $request){

//        return $request->all();

        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInputs();
        }

        $permission = new Permission;

        $permission->name = $request->input('permission');
        $permission->slug = $request->input('slug');
        $permission->description = $request->input('description');

        $permission->save();
//        flash('Permission Created Successfully.','success');
        return redirect()->back();//;->to('cpanel/manage-permission');
    }
    //GET
    public function show($id){

    }
    //GET
    public function edit($id){

    }
    //POST
    public function update($id,Request $request){

    }
    //GET
    public function destroy($id){

    }

}
