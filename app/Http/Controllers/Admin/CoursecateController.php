<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course_cate\Course_category;
use App\Http\Requests\Admin\Course_cate\Course_categoryUpdate;
use App\Models\CourseCategory;
use App\Services\Admin\CourseCateService;
use Illuminate\Http\Request;

class CoursecateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = CourseCategory::get();
        return view('admin.pages.course_category.index')->with(['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      
        return view('admin.pages.course_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Course_category $request, CourseCateService $courseCateService, CourseCategory $courseCategory)
    {
        //
        //dd($courseCategory);
        $courseCateService->create($request, $courseCategory);
        return redirect()->route('cource_category.index');
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
        $category = CourseCategory::where('id', $id)->first();
        //dd( $category );
        return view('admin.pages.course_category.edit')->with(['data' => $category ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Course_categoryUpdate $request, CourseCateService $courseCateService, $id)
    {
        //
        $courseCateService->update($request, $id);
        return redirect()->route('cource_category.index')->with(
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
        $college = CourseCategory::findOrFail($id);
        $college->delete();
    
        return redirect()->route('cource_category.index')->with(
            'success',
            'Stream deleted successfully'
        );
    }
}
