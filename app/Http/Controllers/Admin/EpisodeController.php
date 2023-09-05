<?php

namespace App\Http\Controllers\Admin;

use getID3;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\EpisodeRequest;

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

        $data = $request->validated();
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file_name = uploadFile('public/images/episodes/cover/', $request->cover);

            $data['cover'] = $file_name;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = uploadFile('public/images/episodes/image/', $request->image);

            $data['image'] = $file_name;
        }

        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $file_name = uploadFile('public/videos/episodes/', $request->video);

            $data['video'] = $file_name;

            $path = Storage::path("public/videos/episodes/" . $file_name);

            $getID3 = new getID3;
            $video_file = $getID3->analyze($path);

            $duration_seconds = $video_file['playtime_string'];

            $data['duration'] = $duration_seconds;
        }

        $data['course_id'] = $course->id;

        $episode = Episode::create($data);

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
        
        $data = $request->validated();

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file_name = uploadFile('images/episodes/cover/', $request->cover);

            $data['cover'] = $file_name;
        }else{
            $data['cover'] = $episode->cover;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = uploadFile('images/episodes/image/', $request->image);

            $data['image'] = $file_name;
        }else{
            $data['image'] = $episode->image;
        }

        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $file_name = uploadFile('videos/episodes/', $request->video);

            $data['video'] = $file_name;
        }else{
            $data['video'] = $episode->video;
        }

        $episode->update($data);

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
