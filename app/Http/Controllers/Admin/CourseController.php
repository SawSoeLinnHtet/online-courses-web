<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Course::with(['Instructor:id,name', 'Category:id,title'])->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Instructor $instructor)
    {
        $categories = $category->select('id', 'title')->get();
        $instructors = $instructor->select('id', 'name')->get();

        return view('backend.course.create', ['categories' => $categories, 'instructors' => $instructors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create($request->except('_token'));

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course = $course->where('id', $course->id)->with(['Instructor:id,name', 'Category:id,title'])->first();

        return view('backend.course.details', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Category $category, Instructor $instructor)
    {
        $categories = $category->select('id', 'title')->get();
        $instructors = $instructor->select('id', 'name')->get();

        return view('backend.course.edit', ['categories' => $categories, 'instructors' => $instructors, 'course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->except(['_token', '_method']));

        return redirect()->route('admin.courses.index')->with('success', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(['success' => 'Course deleted successfully']);
    }
}
