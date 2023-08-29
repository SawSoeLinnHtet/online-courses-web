<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\InstructorRequest;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkRolePermission('view-instructor');
        if ($request->ajax()) {

            $data = Instructor::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkRolePermission('create-instructor');
        return view('backend.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorRequest $request)
    {
        $this->checkRolePermission('create-instructor');

        $data = $request->validated();

        if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $file_name = uploadFile('images/instructors/', $request->profile);

            $data['profile'] = $file_name;
        }

        $data['links'] = json_encode($request->links);
        $instructor = Instructor::create($data);
        
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        $this->checkRolePermission('view-instructor');
        return view('backend.instructor.details', ['instructor' => $instructor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        $this->checkRolePermission('edit-instructor');
        return view( 'backend.instructor.edit', ['instructor' => $instructor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorRequest $request, Instructor $instructor)
    {
        $this->checkRolePermission('edit-instructor');

        $data = $request->validated();

        if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $file_name = uploadFile('images/instructors/', $request->profile);

            $data['profile'] = $file_name;
        }else{
            $data['profile'] = $instructor->profile ?? null;
        }

        $data['links'] = json_encode($request->links);

        $instructor->update($data);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $this->checkRolePermission('delete-instructor');
        $instructor->delete();

        return response()->json(['success' => "Instructor'data is deleted."]);
    }
}
