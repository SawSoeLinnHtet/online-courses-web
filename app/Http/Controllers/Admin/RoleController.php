<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkRolePermission('view-role');

        if ($request->ajax()) {

            $data = Role::with('Permissions')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('permissions', function ($row) {
                    return view('backend.role.partials.permission-badge', ['permissions' => $row->Permissions])->render();
                })
                ->rawColumns(['permissions'])
                ->make(true);
        }
        return view('backend.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkRolePermission('create-role');
        $permissions = Permission::toBase()->get()->pluck('name', 'id')->toArray();

        return view('backend.role.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkRolePermission('create-role');
        $attributes = $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array'
        ]);

        $role = Role::create([
            'name' => $attributes['name'],
            'guard_name' => 'admin'
        ]);

        $role->syncPermissions($attributes['permission']);

        return redirect()->route('admin.roles.index')->with('success', 'Role has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkRolePermission('view-role');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->checkRolePermission('edit-role');

        $permissions = Permission::toBase()->get()->pluck('name', 'id')->toArray();

        $data = Role::where('id', $role->id)->with('permissions')->first();
        $permission_ids = $data->permissions->pluck('id', 'id')->toArray();

        return view('backend.role.edit', ['role' => $data, 'permission_ids' => $permission_ids, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permission' => 'required|array'
        ]);

        $role->update([
            'name' => $attributes['name'],
            'guard_name' => 'admin'
        ]);

        $role->syncPermissions($attributes['permission']);

        return redirect()->route('admin.roles.index')->with('success', 'Role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkRolePermission('delete-role');
    }
}
