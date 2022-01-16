<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

            $view_link = '<a href="#" class="action-icon"><i class="mdi mdi-eye"></i></a>';

            $edit_link = '<a href="#" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';

            $destroy_link = '<a href="#" class="action-icon"> <i class="mdi mdi-delete"></i></a>';

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
