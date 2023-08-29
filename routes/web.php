<?php

use App\Http\Controllers\Common\Auth\ForgotPasswordController;
use App\Http\Controllers\Common\Auth\LoginController;
use App\Http\Controllers\Common\Auth\RegisterController;
use App\Http\Controllers\Common\Auth\ResetPasswordController;
use App\Http\Controllers\Common\Auth\VerificationController;
use App\Http\Controllers\Common\CollegeInfoController;
use App\Http\Controllers\Common\ContactUsController;
use App\Http\Controllers\Common\CourseCollegeFilterController;
use App\Http\Controllers\Common\CourseInfoController;
use App\Http\Controllers\Common\dependetController;
use App\Http\Controllers\Common\GifyShopCardController;
use App\Http\Controllers\Common\LocationController;
use App\Http\Controllers\Common\VerifyAndPasswordResetController;
use App\Http\Controllers\Example\ExampleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Common\GiftController;
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


//Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
//Teacher Home Page
Route::get('/teacher', [HomeController::class, 'teacher'])->name('teacher.home');

//Contact Us Page
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactUsController::class, 'sendMail'])->name('common.sendMail');

Route::get('/states', [dependetController::class, 'getCollege'])->name('common.states');
Route::get('/cities', [dependetController::class, 'getExams'])->name('common.cities');


Route::group(['middleware' => 'guest'], function () {
    //sign in
    Route::get('signin', [LoginController::class, 'showLoginForm'])->name('common.signin');
    Route::post('signin', [LoginController::class, 'login']);
    Route::get('/colleges', [CourseCollegeFilterController::class, 'colleges'])->name('common.colleges');
    Route::get('/courses', [CourseCollegeFilterController::class, 'course'])->name('common.courses');
    Route::get('/exams', [CourseCollegeFilterController::class, 'exams'])->name('common.exams');
    Route::get('/college/{id}', [CollegeInfoController::class, 'collegeInfo'])->name('common.collegeinfo');
    Route::get('/course/{id}', [CourseInfoController::class, 'courseInfo'])->name('common.courseinfo');

    // registrations
    Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('common.signup');
    Route::post('/signup', [RegisterController::class, 'register'])->name('common.signup.submit');

    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('common.verification.resend');
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('common.verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('common.verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('common.verification.resend');
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('common.verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('common.verification.verify');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('common.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('common.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('common.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('common.password.update');
    Route::get('verify&password/{id}',[VerifyAndPasswordResetController::class,'Resetform'])->name('common.verifyReset');
    Route::post('setpassword',[VerifyAndPasswordResetController::class,'setPassword'])->name('common.setpassword');
});