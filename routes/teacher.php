<?php

use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Common\Auth\LoginController;
use App\Http\Controllers\Common\GiftController;
use App\Http\Controllers\Parent\TeacherController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\GiftHistoryController;
use App\Http\Controllers\Teacher\InviteController;
use App\Http\Controllers\Teacher\InviteRegistrationController;
use App\Http\Controllers\Teacher\MessageController;
use App\Http\Controllers\Teacher\ParentController;
use App\Http\Controllers\Teacher\ParentNoteController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\SupplyController;
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

Route::group(['middleware' => ['auth:teachers']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
