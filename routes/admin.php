<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CollegeCourseController;
use App\Http\Controllers\Admin\CoursecateController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DisputeManageController;
use App\Http\Controllers\Admin\EntranceExamContoller;
use App\Http\Controllers\Admin\FaqHomepageController;
use App\Http\Controllers\Admin\FaqTeacherHomepageController;
use App\Http\Controllers\Admin\Reports\DonationReportController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HomepageTestimonialController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\MessagesManageController;
use App\Http\Controllers\Admin\MessagesManagementController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\Reports\PayoutReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\StreamsController;
use App\Http\Controllers\Admin\studentCntroller;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeacherTestimonialController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeacherHomepageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Common\notificationController;
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

// Auth::routes(['register' => false]);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/streams', [StreamsController::class, 'index'])->name('streams');
    Route::get('/steams/new', [StreamsController::class, 'create'])->name('form');
    Route::post('/steams/store', [StreamsController::class, 'store'])->name('create');
    Route::get('/steams/edit/{id}', [StreamsController::class, 'edit'])->name('edit');
    Route::post('/steams/update/{id}', [StreamsController::class, 'update'])->name('update');
    Route::delete('/steams/delete/{id}', [StreamsController::class, 'destroy'])->name('delete');
    Route::resource('courses', CourseController::class, ['except' => ['show']]);
    Route::resource('college', CollegeController::class, ['except' => ['show']]);
    Route::resource('cource_category', CoursecateController::class, ['except' => ['show']]);
    Route::resource('cource_college', CollegeCourseController::class, ['except' => ['show']]);
    Route::resource('entrance', EntranceExamContoller::class, ['except' => ['show']]);
    Route::resource('notification', notificationController::class, ['except' => ['show']]); 
    Route::get('/studens', [studentCntroller::class, 'index'])->name('students');
});
