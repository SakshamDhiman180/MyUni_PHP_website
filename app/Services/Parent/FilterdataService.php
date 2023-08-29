<?php

namespace App\Services\Parent;

use App\Models\College;
use App\Models\Course;
use App\Models\EntranceExam;
use App\Models\GiftDonation;
use App\Models\InviteTeacherStatus;
use App\Models\Note;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class FilterdataService
{
    public function giftCardData($request)
    {
        // dd($request);
        $donationsData = EntranceExam::with(['college', 'course']);
        if ($request->filled('streams')) {
            $donationsData->where('id', $request->get('streams'));
        }
        if ($request->filled('course')) {
            $donationsData->where('course_id', $request->get('course'));
        }
        if ($request->filled('exam')) {
            $donationsData->where('id', $request->get('exam'));
        }
        if ($request->filled('year')) {
            $donationsData->where('admission_year', '>', $request->get('year'));
        }
        return $donationsData->get();
    }

    public function collegesData($request)
    {
        $donationsData = College::with('courses', 'exam');
        //  dd($request->get('stream'));

        if ($request->filled('stream')) {
            $stream = $request->get('stream');
            $donationsData->whereJsonContains('streams', $stream);
        }

        if ($request->filled('course')) {
            $donationsData->whereHas('courses', function ($query) use ($request) {
                $query->where('courses.id', $request->get('course'));
            });
        }

        if ($request->filled('exam')) {
            $donationsData->whereHas('exam', function ($query) use ($request) {
                $query->where('id', $request->get('exam'));
            });
        }

        return $donationsData->get();
    }

    public function courseData($request)
    {
        $donationsData = Course::with(['stream', 'category', 'colleges', 'entranceExams']);

        if ($request->filled('streamFilter')) {
            $donationsData->whereHas('stream', function ($query) use ($request) {
                $query->where('id',  $request->get('streamFilter'));
            });
        }

        if ($request->filled('collegeFilter')) {
            $donationsData->whereHas('colleges', function ($query) use ($request) {
                $query->where('colleges.id', $request->get('collegeFilter'));
            });
        }

        if ($request->filled('examFilter')) {
            $donationsData->whereHas('entranceExams', function ($query) use ($request) {
                $query->where('id', $request->get('examFilter'));
            });
        }

        if ($request->filled('admissionViaExam')) {
            $donationsData->where('admission_exam', $request->get('admissionViaExam'));
        }

        if ($request->filled('feeFilter')) {
            $donationsData->whereHas('entranceExams', function ($query) use ($request) {
                $query->where('fee', '<=', $request->get('feeFilter'));
            });
        }

        return  $donationsData->get();
    }
}
