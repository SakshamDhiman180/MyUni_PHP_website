<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course_cate\Course_category;
use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\EntranceExam;
use App\Models\Notification;
use App\Models\Stream;
use App\Services\Parent\CourseService;
use App\Services\Parent\FilterdataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class sidebarController extends Controller
{
    //
    public function course(Request $request, FilterdataService $courseService)
    {
        $streams = Stream::get();
        $exams = EntranceExam::get();
        $colleges = College::get();
        $examFees = EntranceExam::get('fee');
        if (request()->ajax()) {
            return DataTables::of($courseService->courseData($request))
                ->addIndexColumn()
                ->addColumn('action', function ($course) {
                    return '<a href="' . route('parent.course.show', $course->id) . '" class="btn btn-info">More Info</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $ListData = Course::with('stream', 'category')->get();

        return view('parent.pages.course')->with([
            'streams' => $streams,
            'exams' => $exams,
            'colleges' => $colleges,
            'exam_fees' => $examFees,
        ]);
    }


    public function colleges(Request $request, FilterdataService $courseService)
    {
        $streams = Stream::get();
        $courses = Course::get();
        $exams = EntranceExam::get();

        if (request()->ajax()) {
            return DataTables::of($courseService->collegesData($request))
                ->addIndexColumn()
                ->addColumn('action', function ($college) {
                    return '<a href="' . route('parent.college.show', $college->id) . '" class="btn btn-info">More Info</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('parent.pages.college')->with([
            'courses' => $courses,
            'streams' => $streams,
            'exams' => $exams,
        ]);
    }


    public function entranceExam(Request $request, FilterdataService $courseService)
    {
        $streams = Stream::get();
        $courses = Course::get();
        $exams = EntranceExam::get();

        if (request()->ajax()) {
            return DataTables::of($courseService->giftCardData($request))
                ->addIndexColumn()
                ->addColumn('action', function ($exam) {
                    return '<a href="' . route('parent.exam.show', $exam->id) . '" class="btn btn-info">More Info</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('parent.pages.exam')->with([
            'courses' => $courses,
            'streams' => $streams,
            'exams' => $exams,
        ]);
    }

    public function courseInfo($id)
    {
        $courseInfo = CollegeCourse::where('course_id', $id)->with('college', 'course')->get();
        $stream = Stream::where('id',  $courseInfo[0]->course->stream_id)->first();
        $category = CourseCategory::where('id',  $courseInfo[0]->course->category_code)->first();
        //dd( $category ,$stream,$courseInfo);
        return view('parent.pages.courseinfo')->with(['courseInfo' => $courseInfo, 'streamInfo' => $stream, 'categoryInfo' => $category]);
    }

    public function collegeInfo($id)
    {
        $collegeData = College::Where('id', $id)->first();
        return view('parent.pages.collegeinfo')->with(['collegeData' => $collegeData]);
    }

    public function examInfo($id)
    {
        $examInfo = EntranceExam::where('id', $id)->first();
        //dd($examInfo);
        return view('parent.pages.examinfo')->with(['ExamInfo' => $examInfo]);
    }

    public function notification()
    {
        $userCourseId = Auth::user()->course_id;

        $notifications = Notification::where([
            ['course_id', $userCourseId],
            ['status', 'active'],
        ])->get();

        return view('parent.pages.notifications', ['notification' => $notifications]);
    }
}
