<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset{token}', [AuthController::class, 'PostReset']);




Route::group(['middleware'=>'admin'], function(){
    Route::get('admin/dashboard', [DashbaordController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/update/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'Delete']);
 

});

Route::group(['middleware'=>'teacher'], function(){
    Route::get('teacher/dashboard', [DashbaordController::class, 'dashboard']);
    
});

Route::group(['middleware'=>'student'], function(){
    Route::get('student/dashboard', [DashbaordController::class, 'dashboard']);
});

Route::group(['middleware'=>'parent'], function(){
    Route::get('parent/dashboard', [DashbaordController::class, 'dashboard']);
});