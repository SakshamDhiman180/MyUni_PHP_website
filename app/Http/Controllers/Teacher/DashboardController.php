<?php

namespace App\Http\Controllers\Teacher;

use App\Services\Teacher\DashboardService;

class DashboardController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(DashboardService $dashboardService)
     {


         return view('teacher.dashboard');
     }
}
