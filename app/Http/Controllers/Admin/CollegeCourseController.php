<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCollege\createRequest;
use App\Http\Requests\Admin\CourseCollege\createUpdateRequest;
use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Services\Admin\CourseCollegeService;
use Illuminate\Http\Request;

class CollegeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $collegeCourse = CollegeCourse::with(['course','college'])->get();
        //dd($collegeCourse);
        return view('admin.pages.course_college.index')->with(['collegeList' => $collegeCourse]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $colleges = College::get();
        $courses = Course::get();
        return view('admin.pages.course_college.create')->with([ 'courseList'=> $courses ,'collegeList' => $colleges]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequest $request, CourseCollegeService $courseCollegeService, CollegeCourse $collegeCourse)
    {
        //
       // dd($request);
        $courseCollegeService->create($request, $collegeCourse);
        return redirect()->route('cource_college.index');

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
    public function edit($id)
    {
        //
        $data = CollegeCourse::where('id', $id)->first();
        $colleges = College::get();
        $courses = Course::get();
        return view('admin.pages.course_college.edit')->with(['formdata' => $data, 'collegeList' => $colleges, 'courseList' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createUpdateRequest $request, CourseCollegeService $courseCollegeService,$id)
    {
        //
        //dd($request);
        $courseCollegeService->update($request, $id);
        return redirect()->route('cource_college.index')->with(
            'success',
            'stream edited successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $college = CollegeCourse::findOrFail($id);
        $college->delete();
    
        return redirect()->route('cource_college.index')->with(
            'success',
            'Stream deleted successfully'
        );
    }
}
