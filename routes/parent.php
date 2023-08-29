<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Common\Auth\LoginController;
use App\Http\Controllers\Parent\DashboardController;
use App\Http\Controllers\Common\GiftController;
use App\Http\Controllers\Parent\CourseController as ParentCourseController;
use App\Http\Controllers\Parent\DisputeRefundController;
use App\Http\Controllers\Parent\GiftHistoryController;
use App\Http\Controllers\Parent\MessageController;
use App\Http\Controllers\Parent\ProfileController;
use App\Http\Controllers\Parent\sidebarController;
use App\Http\Controllers\Parent\TeacherController;
use App\Http\Controllers\Parent\TeacherNoteController;
use App\Http\Controllers\Teacher\ParentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['auth:parents']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('profile', ProfileController::class, ['except' => ['show']]);
    Route::get('/course', [sidebarController::class, 'course'])->name('course'); 
    Route::get('/course/info/{id}', [sidebarController::class, 'courseInfo'])->name('course.show'); 
    Route::get('/college', [sidebarController::class, 'colleges'])->name('college'); 
    Route::get('/college/info/{id}', [sidebarController::class, 'collegeInfo'])->name('college.show'); 
    Route::get('/exam', [sidebarController::class, 'entranceExam'])->name('exam'); 
    Route::get('/exam/info/{id}', [sidebarController::class, 'examInfo'])->name('exam.show'); 
    Route::get('/notifications', [sidebarController::class, 'notification'])->name('notifications'); 
});
