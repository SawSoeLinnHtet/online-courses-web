<?php

namespace App\Http\Controllers\Site;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::get()->toArray();

        return view('site.home.index', ['courses' => $courses]);
    }
}
