<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables;
class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

        } else {
            return view('admin::admin.index');
        }
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
