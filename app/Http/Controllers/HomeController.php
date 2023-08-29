<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use App\Services\HomepageService;
use App\Models\FaqHomePage;
use App\Models\FaqTeacherHomePage;
use App\Models\HomepageContent;
use App\Models\TeacherHomepageContent;


class HomeController extends Controller
{
    protected $homepageService;

    public function __construct(HomepageService $homepageService)
    {
        $this->homepageService = $homepageService;
    }

    public function index()
    {
        session(['previous_route' => 'home']);
        $courses = Course::get();
        $colleges = College::get();
        return view('home')->with(['courses' => $courses, 'colleges' =>  $colleges]);
    }

    public function teacher()
    {
        session(['previous_route' => 'teacher_home']);
        return view('common.teacher-home');
    }
}
