<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EpisodeRequest;
use Yajra\DataTables\Facades\DataTables;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, Request $request)
    {
        $this->checkRolePermission('view-episode');
        if ($request->ajax()) {
            $data = Episode::where('course_id', $course->id)->with(['Course:id,title'])->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.course.episode.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $this->checkRolePermission('create-episode');
        return view('backend.course.episode.create', ['course_id' => $course->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request, Course $course)
    {
        $this->checkRolePermission('create-episode');
        $episode = Episode::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'course_id' => $course->id,
            'privacy' => $request->privacy
        ]);

        return redirect()->route('admin.courses.episodes.index', $course->id)->with('success', 'Episode created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Episode $episode)
    {
        return view('backend.course.episode.details', ['episode' => $episode, 'course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Episode $episode)
    {
        $this->checkRolePermission('delete-episode');

        return view('backend.course.episode.edit', ['episode' => $episode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request, Course $course, Episode $episode)
    {
        $this->checkRolePermission('delete-episode');

        $episode = $episode->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'course_id' => $course->id,
            'privacy' => $request->privacy
        ]);

        return redirect()->route('admin.courses.episodes.index', $course->id)->with('success', 'Episode updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Episode $episode)
    {
        $this->checkRolePermission('delete-episode');
        $episode->delete();

        return response()->json(['success' => 'Course deleted successfully']);
    }
}
