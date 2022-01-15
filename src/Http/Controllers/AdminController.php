<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin::admin.index', ['admins' => []]);
    }

    public function table(Request $request)
    {
        $page_size = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'email', '', 'created_at', 'updated_at', 'status'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Admin::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('email', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $admins = $query->paginate($page_size);
        $rows = [];
        foreach ($admins as $admin) {
            $row = [];
            $row[] = $admin->id;
            $row[] = '<img src="' . $admin->avatar_url . '" alt="' . $admin->name . '" title="' . $admin->name . '" class="me-2 rounded-circle"><p class="m-0 d-inline-block align-middle font-16"><a href="' . route('admin.admins.show', $admin) . '" class="text-body">' . $admin->name . '</a></p>';
            $row[] = $admin->email;
            $row[] = '';
            $row[] = Carbon::parse($admin->created_at)->diffForHumans();
            $row[] = Carbon::parse($admin->updated_at)->diffForHumans();
            $row[] = $admin->is_active ? 'active' : 'deactive';
            $row[] = '';
            $rows[] = $row;
        }
        return [
            'draw' => $request->draw,
            'recordsTotal' => $admins->total(),
            'recordsFiltered' => $admins->total(),
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
