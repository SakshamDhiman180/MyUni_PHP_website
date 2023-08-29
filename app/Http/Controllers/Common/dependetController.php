<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\EntranceExam;
use Illuminate\Http\Request;

class dependetController extends Controller
{
    //
    public function getCollege(Request $request)
    {
        $cid = $request->cid;
      
        $data['college'] = CollegeCourse::where('course_id', $cid)
            ->with(['college' => function ($query) {
                $query->select('name', 'id');
            }])
            ->get();
      
        return response()->json($data);
    }

    public function getExams(Request $request)
    {
       
        $sid = $request->sid;
        $data['exams'] = EntranceExam::where('college_id', $sid)->get();
        
        return response()->json($data);
    }
}
