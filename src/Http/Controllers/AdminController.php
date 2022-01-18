<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('admin::admin.index');
        }
    }

    private function table(Request $request)
    {
        $start = $request->input('start', 0);
        $limit = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'email', 'created_at', 'updated_at', 'status'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Admin::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('email', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $count = $query->count();
        $admins = $query->skip($start)->take($limit)->get();
        $rows = [];
        foreach ($admins as $admin) {
            $row = [];
            $row[] = $admin->id;
            $row[] = '<img src="' . $admin->avatar_url . '" alt="' . $admin->name . '" title="' . $admin->name . '" class="me-2 rounded-circle"><p class="m-0 d-inline-block align-middle font-16">' . $admin->name . '</p>';
            $row[] = $admin->email;
            $row[] = Carbon::parse($admin->created_at)->format('Y-m-d H:i:s');
            $row[] = Carbon::parse($admin->updated_at)->format('Y-m-d H:i:s');
            $row[] = $admin->status ? '<span class="badge bg-success">' . __('admin::admin.active') . '</span>' : '<span class="badge bg-danger">' . __('admin::admin.inactive') . '</span>';

            $view_link = '<a href="' . route('admin.admins.show', $admin) . '" class="action-icon"><i class="mdi mdi-eye"></i></a>';

            $edit_link = '<a href="' . route('admin.admins.edit', $admin) . '" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';

            $edit_role = '<a href="' . route('admin.admins.roles', $admin) . '" class="action-icon"><i class="mdi mdi-account-multiple-plus"></i></a>';

            $edit_permission = '<a href="' . route('admin.admins.permissions', $admin) . '" class="action-icon"><i class="mdi mdi-account-lock"></i></a>';

            $destroy_link = '';
            if (!$admin->owner) {
                $destroy_link = '<a href="javascript:void(0);" class="action-icon delete-btn" data-table="admins_table" data-url="' . route('admin.admins.destroy', $admin) . '"> <i class="mdi mdi-delete"></i></a>';
            }

            $row[] = $view_link . $edit_link . $edit_role . $edit_permission . $destroy_link;
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
        return view('admin::admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:admins']
        ]);
        $admin = new Admin($request->only(['name', 'email', 'bio']));
        $admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $admin->status = $request->boolean('status');
        $admin->save();
        Password::broker('admins')->sendResetLink($request->only('email'));
        return back()->with('success', __('admin::admin.added_success'));
    }

    public function show($id)
    {
        $admin = Admin::query()->findOrFail($id);
        return view('admin::admin.show', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = Admin::query()->findOrFail($id);
        return view('admin::admin.edit', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);
        $admin = Admin::query()->findOrFail($id);
        $admin->fill($request->only(['name', 'bio']));
        $admin->status = $request->boolean('status');
        $admin->save();
        return back()->with('success', __('admin::admin.update_success'));
    }

    public function destroy($id)
    {
        return ['status' => Admin::destroy($id)];
    }

    public function roles(Request $request, $id)
    {

    }

    public function role(Request $request, $id)
    {

    }

    public function permissions(Request $request, $id)
    {

    }

    public function permission(Request $request, $id)
    {

    }
}
