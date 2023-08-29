<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\CollegeCourse;
use App\Models\CourseCategory;
use App\Models\Stream;
use Illuminate\Http\Request;

class CourseInfoController extends Controller
{
    //

    public function courseInfo($id){
        $courseInfo = CollegeCourse::where('course_id', $id)->with('college','course')->get();
        $stream = Stream::where('id',  $courseInfo[0]->course->stream_id)->first();
        $category = CourseCategory::where('id',  $courseInfo[0]->course->category_code)->first();
       //dd( $category ,$stream,$courseInfo);
       return view('courseinfo')->with(['courseInfo' => $courseInfo, 'streamInfo'=> $stream, 'categoryInfo'=> $category ]);
    }
}
