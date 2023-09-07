<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['Instructor:id,name,profile', 'Category:id,title', 'Episode'])->latest()->paginate(9);
        $count = count(Course::pluck('id')->toArray());

        return view('site.courses.index', ['courses' => $courses, 'count' => $count]);
    }

    public function details(Course $course)
    {
        $episodes = Episode::where('course_id', $course->id)->get();
        $instructor = Instructor::where('id', $course->instructor_id)->get();

        return view('site.courses.details', ['course' => $course, 'episodes' => $episodes]);
    }
}
