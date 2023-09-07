<?php

use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CourseController;
use App\Http\Controllers\Site\EpisodeController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Auth\ResetPasswordController;
use App\Http\Controllers\Site\Auth\ForgotPasswordController;
use App\Http\Controllers\Site\Auth\EmailVerificationController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\Admin\Auth\ResetPasswordController as AdminResetPassword;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController as AdminForgotPassword;
use App\Http\Controllers\Site\HomeController;

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
    Route::get('login', [AdminLogin::class, 'index'])->name('login.index');
    Route::post('login', [AdminLogin::class, 'auth'])->name('login.auth');
    Route::get('forgot-password', [AdminForgotPassword::class, 'index'])->name('forgot-password.index');
    Route::post('forgot-password', [AdminForgotPassword::class, 'sendEmail'])->name('forgot-password.send');
    Route::get('reset-password', [AdminResetPassword::class, 'index'])->name('reset-password.index');
    Route::post('reset-password/reset', [AdminResetPassword::class, 'reset'])->name('reset-password.reset');
});

Route::post('admin/logout', [AdminLogin::class, 'logout'])->name('admin.logout');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth.admin'
], function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');
    Route::resource('admins', App\Http\Controllers\Admin\AdminController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('instructors', App\Http\Controllers\Admin\InstructorController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('courses.episodes', App\Http\Controllers\Admin\EpisodeController::class);
});

Route::group([
    'as' => 'site.',
    'middleware' => ['guest']
], function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('get.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('post.register');
    Route::get('/login', [LoginController::class, 'index'])->name('get.login');
    Route::post('/login', [LoginController::class, 'login'])->name('post.login');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('forgot-password.send');
    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset-password');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password.reset');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('site.logout');

Route::group([
    'prefix' => 'email/verify',
    'middleware' => ['guest']
], function () {
    Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('/request', [EmailVerificationController::class, 'request'])->name('verification.request');
    Route::get('/sent', [EmailVerificationController::class, 'sent'])->name('verification.sent');
    Route::get('/success', [EmailVerificationController::class, 'success'])->name('verification.success');
    Route::get('/expired', [EmailVerificationController::class, 'expired'])->name('verification.expired');
    Route::get('/resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
});

Route::group([
    'as' => 'site.',
    'namespace' => 'App\Http\Controllers\Site',
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course:slug}/details', [CourseController::class, 'details'])->name('courses.details');
    Route::get('/courses/{course:slug}/episodes/{slug}', [EpisodeController::class, 'details'])->name('courses.episodes.details');
    Route::get('/contact', function () {
        return view('site.contact_us.index');
    })->name('contact');
    Route::get('/instructors', function () {
        return view('site.instructors.index');
    })->name('instructors');
});

