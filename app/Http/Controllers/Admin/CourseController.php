<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Courses\CourseRequest;
use App\Http\Requests\Admin\Courses\CourseUpdateRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Stream;
use App\Services\Admin\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::with(['stream', 'category'])->get();
        return view('admin.pages.courses.index')->with(['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $streams = Stream::get();
        $category = CourseCategory::get();
        return view('admin.pages.courses.create')->with(['streams' => $streams, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request, Course $course, CourseService $courseService)
    {
       
        $courseService->create($request, $course);
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $course = Course::where('id', $id)->first();
        $streams = Stream::get();
        return view('admin.pages.courses.edit')->with([
            'course' => $course,
            'streams' => $streams
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, CourseService $courseService, $id)
    {
        //
        $courseService->update($request, $id);
        return redirect()->route('courses.index')->with(
            'success',
            'stream edited successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $course = Course::findOrFail($id);
        $course->delete();
    
        return redirect()->route('courses.index')->with(
            'success',
            'Stream deleted successfully'
        );
    }
}
