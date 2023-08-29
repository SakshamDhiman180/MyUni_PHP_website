<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeInfoController extends Controller
{
    //
    public function collegeInfo($id){
      //dd("I am here");
      $collegeData = College::Where('id', $id)->first();
      return view('collegeinfo')->with(['collegeData' => $collegeData]);
    }
}
