<?php

namespace App\Http\Controllers\Site;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodeController extends Controller
{
    public function details (Course $course, $episode)
    {
        $current_episode = Episode::where('slug', $episode)->where('course_id', $course->id)->firstOrFail();
        $episodes = Episode::where('course_id', $course->id)->get()->toArray();

        return view('site.episodes.index', ['course' => $course,'episodes' => $episodes ,'current_episode' => $current_episode]);
    }
}
