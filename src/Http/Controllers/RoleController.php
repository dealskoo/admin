<?php

namespace Dealskoo\Admin\Http\Controllers;

use Carbon\Carbon;
use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Models\Permission;
use Dealskoo\Admin\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('admin::role.index');
        }
    }

    private function table(Request $request)
    {
        $start = $request->input('start', 0);
        $limit = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'created_at', 'updated_at'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Role::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $count = $query->count();
        $roles = $query->skip($start)->take($limit)->get();
        $rows = [];
        foreach ($roles as $role) {
            $row = [];
            $row[] = $role->id;
            $row[] = $role->name;
            $row[] = Carbon::parse($role->created_at)->format('Y-m-d H:i:s');
            $row[] = Carbon::parse($role->updated_at)->format('Y-m-d H:i:s');

            $view_link = '<a href="' . route('admin.roles.show', $role) . '" class="action-icon"><i class="mdi mdi-eye"></i></a>';

            $edit_link = '<a href="' . route('admin.roles.edit', $role) . '" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';

            $destroy_link = '<a href="javascript:void(0);" class="action-icon delete-btn" data-table="roles_table" data-url="' . route('admin.roles.destroy', $role) . '"> <i class="mdi mdi-delete"></i></a>';

            $row[] = $view_link . $edit_link . $destroy_link;
            $rows[] = $row;
        }
        return [
            'draw' => $request->draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $rows
        ];
    }

    public function create()
    {
        $permissions = PermissionManager::all();
        return view('admin::role.create', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles'],
            'permissions' => ['array']
        ]);
        $role = new Role($request->only(['name']));
        $role->save();
        $role->permissions()->delete();
        $permissions = [];
        foreach ($request->input('permissions') as $perm) {
            $permissions[] = new Permission(['key' => $perm]);
        }
        $role->permissions()->saveMany($permissions);
        return back()->with('success', __('admin::admin.added_success'));
    }

    public function show($id)
    {
        $role = Role::query()->findOrFail($id);
        return view('admin::role.show', ['role' => $role]);
    }

    public function edit($id)
    {
        $role = Role::query()->findOrFail($id);
        $permissions = PermissionManager::all();
        return view('admin::role.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'permissions' => ['array']
        ]);
        $role = Role::query()->findOrFail($id);
        $role->fill($request->only(['name']));
        $role->save();
        $role->permissions()->delete();
        $permissions = [];
        foreach ($request->input('permissions') as $perm) {
            $permissions[] = new Permission(['key' => $perm]);
        }
        $role->permissions()->saveMany($permissions);
        return back()->with('success', __('admin::admin.update_success'));
    }

    public function destroy($id)
    {
        return ['status' => Role::destroy($id)];
    }
}
