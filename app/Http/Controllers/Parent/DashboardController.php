<?php

namespace App\Http\Controllers\Parent;

use App\Models\College;
use App\Models\Course;
use App\Models\Notification;
use App\Models\ParentUser;
use App\Services\Parent\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(DashboardService $dashboardService)
    {

        $course = Course::get();
        $userData = ParentUser::where('id', Auth::user()->id)->first();
        $userCollege = College::where('id', $userData->college_id)->first();
        $notification = Notification::where([
            ['course_id', Auth::user()->course_id],
            ['status', 'active'],
        ])->get();
        $userCourse = Course::where('id', $userData->course_id)->with('stream', 'category')->first();
        return view('parent.dashboard')->with(['course' => $course, 'userData'=>$userData, 'userCollege' => $userCollege, 'userCourse'=> $userCourse, 'notification' => $notification]);
    }
}
