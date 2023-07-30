<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\CourseRequest;

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
            $data = Course::with(['Instructor:id,name', 'Category:id,title'])->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('categories', function ($row) {
                    return view('backend.course.partials.category-badge', ['categories' => $row->Category])->render();
                })
                ->rawColumns(['categories'])
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

        foreach($request->category_ids as $id){
            CategoryCourse::create([
                'category_id' => $id,
                'course_id' => $course->id
            ]);
        }

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

        $data =  $course->where('id', $course->id)->with('Category:id')->first();
        $category_ids = CategoryCourse::where('course_id', $course->id)->pluck('category_id', 'category_id')->toArray();
        
        return view('backend.course.edit', ['categories' => $categories, 'instructors' => $instructors, 'course' => $data, 'category_ids' => $category_ids]);
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

        CategoryCourse::where('course_id', $course->id)->delete();

        foreach($request->category_ids as $id){
            CategoryCourse::create(['category_id' => $id, 'course_id' => $course->id,]);
        }

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
