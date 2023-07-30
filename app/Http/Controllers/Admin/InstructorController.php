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
        Instructor::create($request->except('_token'));

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
        $instructor->update($request->except(['_token', '_method']));

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
        $instructor->delete();

        return response()->json(['success' => "Instructor'data is deleted."]);
    }
}
