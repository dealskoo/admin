<?php

namespace Dealskoo\Admin\Http\Controllers;

use Carbon\Carbon;
use Dealskoo\Admin\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

        } else {
            return view('admin::role.index');
        }
    }

    public function create()
    {
        return view('admin::role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles']
        ]);
        $role = new Role($request->only(['name']));
        $role->save();
        return redirect()->back()->with('success', __('admin::admin.added_success'));
    }

    public function show($id)
    {
        $role = Role::query()->findOrFail($id);
        return view('admin::role.show', ['role' => $role]);
    }

    public function edit($id)
    {
        $role = Role::query()->findOrFail($id);
        return view('admin::role.edit', ['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::query()->findOrFail($id);
        $role->fill($request->only(['name']));
        $role->save();
        return redirect()->back('success', __('admin::admin.update_success'));
    }

    public function destroy($id)
    {

    }
}
