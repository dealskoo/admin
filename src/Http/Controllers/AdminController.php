<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin::admin.index', ['admins' => []]);
    }

    public function table(Request $request)
    {
        $admins = Admin::query()->paginate();
        return ['draw' => $request->draw, 'recordsTotal' => 10, 'recordsFiltered' => 10, 'data' => $admins];
    }

    public function create()
    {
        return view('admin::admin.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return view('admin::admin.show');
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
