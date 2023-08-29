<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\College\CollegeRequest;
use App\Http\Requests\Admin\College\CollegeUpdateRequest;
use App\Models\College;
use App\Models\Stream;
use App\Services\Admin\CollegeService;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $college = College::with('courses')->get();
        return view('admin.pages.colleges.index')->with(['college' => $college]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $streams = Stream::get();
        return view('admin.pages.colleges.create')->with(['streams' => $streams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollegeRequest $request, CollegeService $collegeService, College $college)
    {
        //
        //dd($request);
        $collegeService->create($request, $college);
        return redirect()->route('college.index');
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
        $college = college::where('id', $id)->first();
        $streams = Stream::get();
        return view('admin.pages.colleges.edit')->with(['college' => $college, 'streams' => $streams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollegeUpdateRequest $request, CollegeService $collegeService, $id)
    {
        //
        $collegeService->update($request, $id);
        return redirect()->route('college.index')->with(
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
        $college = College::findOrFail($id);
        $college->delete();
    
        return redirect()->route('college.index')->with(
            'success',
            'Stream deleted successfully'
        );
    }
}
