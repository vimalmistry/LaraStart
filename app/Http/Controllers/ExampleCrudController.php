<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ExampleCrud;
use Illuminate\Http\Request;
use Session;

class ExampleCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $examplecrud = ExampleCrud::paginate(25);

        return view('example-crud.index', compact('examplecrud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('example-crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        ExampleCrud::create($requestData);

        Session::flash('flash_message', 'ExampleCrud added!');

        return redirect('example-crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $examplecrud = ExampleCrud::findOrFail($id);

        return view('example-crud.show', compact('examplecrud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $examplecrud = ExampleCrud::findOrFail($id);

        return view('example-crud.edit', compact('examplecrud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $examplecrud = ExampleCrud::findOrFail($id);
        $examplecrud->update($requestData);

        Session::flash('flash_message', 'ExampleCrud updated!');

        return redirect('example-crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        ExampleCrud::destroy($id);

        Session::flash('flash_message', 'ExampleCrud deleted!');

        return redirect('example-crud');
    }
}
