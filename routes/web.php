<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['guest:admin']
], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'auth'])->name('login.auth');
    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password.index');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('forgot-password.send');
    Route::get('reset-password', [ResetPasswordController::class, 'index'])->name('reset-password.index');
    Route::post('reset-password/reset', [ResetPasswordController::class, 'reset'])->name('reset-password.reset');
});

Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'auth.admin'
], function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('roles', RoleController::class);
});
