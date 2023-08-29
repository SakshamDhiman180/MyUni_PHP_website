<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\entranceExam\enteranceRequest;
use App\Http\Requests\Admin\entranceExam\enteranceUpdateRequest;
use App\Models\Course;
use App\Models\EntranceExam;
use App\Services\Admin\EntranceService;
use Illuminate\Http\Request;

class EntranceExamContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $examList = EntranceExam::with('course')->get();
        return view('admin.pages.entrance_exam.index')->with(['examList'=>$examList]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $course = Course::get();
        return view('admin.pages.entrance_exam.create')->with(['courses' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(enteranceRequest $request, EntranceService $entranceService,EntranceExam $entranceExam)
    {
        //
        $entranceService->create($request, $entranceExam);
        return redirect()->route('entrance.index');
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
        $formData = EntranceExam::where('id', $id)->first();
        $course = Course::get();
        return view('admin.pages.entrance_exam.edit')->with(['formData' => $formData,'courses' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(enteranceUpdateRequest $request, EntranceService $entranceService, $id)
    {
        //
        $entranceService->update($request, $id);
        return redirect()->route('entrance.index')->with(
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
        $Entrance = EntranceExam::findOrFail($id);
        $Entrance->delete();
    
        return redirect()->route('entrance.index')->with(
            'success',
            'Stream deleted successfully'
        );
    }
}
