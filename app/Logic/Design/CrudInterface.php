<?php

namespace App\Logic\Design;

use Illuminate\Http\Request;

interface CrudInterface
{
    //GET
    public function index();

    //GET
    public function data();

    //GET
    public function create();
    //POST
    public function store(Request $request);
    //GET
    public function show($id);
    //GET
    public function edit($id);
    //POST
    public function update($id,Request $request);
    //GET
    public function destroy($id);
}