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

            $data = Role::get();

            return DataTables::of($data)
                ->addIndexColumn()
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
    public function edit($id)
    {
        $this->checkRolePermission('edit-role');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkRolePermission('edit-role');

        
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
