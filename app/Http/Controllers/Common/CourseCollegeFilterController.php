<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Course;
use App\Models\EntranceExam;
use App\Models\Stream;
use App\Services\Parent\FilterdataService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseCollegeFilterController extends Controller
{
    //

    public function course(Request $request, FilterdataService $courseService){
        $streams = Stream::get();
        $exams = EntranceExam::get();
        $colleges = College::get();
        $examFees = EntranceExam::get('fee');
        $allCourses = Course::get();
        
        if ($request->ajax()) {
            $filteredCourses = $courseService->courseData($request); // Apply your filtering logic here
    
            return view('partials.course_list', ['courses' => $filteredCourses])->render();
        }
        
        return view('courses')->with([
            'allCourses' => $allCourses,
            'streams' => $streams,
            'exams' => $exams,
            'colleges' => $colleges,
            'exam_fees'=> $examFees,
        ]);
    }
    

    //use DataTables; // Make sure to include the necessary class

    public function colleges(Request $request, FilterdataService $courseService) {
        $streams = Stream::get();
        $courses = Course::get();
        $exams = EntranceExam::get();
        $allColleges = College::get();
        
        if ($request->ajax()) {
            $filteredColleges = $courseService->collegesData($request); // Apply your filtering logic here
    
            return view('partials.college_list', ['colleges' => $filteredColleges])->render();
        }
        
        return view('colleges')->with([
            'allCollege' => $allColleges,
            'courses' => $courses,
            'streams' => $streams,
            'exams' => $exams,
        ]);
    }
    
    public function exams(Request $request, FilterdataService $courseService) {
        $streams = Stream::get();
        $courses = Course::get();
        $exams = EntranceExam::get();
        
        if ($request->ajax()) {
            $filteredExams = $courseService->giftCardData($request); 
           // dd($filteredExams);
            return view('partials.exam_list', ['exams' => $filteredExams])->render();
        }
        
        return view('exams')->with([
            'courses' => $courses,
            'streams' => $streams,
            'exams' => $exams,
        ]);
    }
}
