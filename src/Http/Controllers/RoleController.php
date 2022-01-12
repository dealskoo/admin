<?php

namespace Dealskoo\Admin\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        return view('admin::role.index');
    }

    public function create()
    {
        return view('admin::role.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return view('admin::role.show');
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
