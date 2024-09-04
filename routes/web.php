<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ForgotPasswordController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('tampilan');
});

Route::get('/', [ProjectController::class, 'index2'])->name('tampilan');
Route::resource('project', ProjectController::class)->middleware('auth');
Route::get('/projects/index2', [ProjectController::class, 'index2'])->name('project.index2');

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk memproses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/projects/{project}/pdf', [ProjectController::class, 'generatePDF'])->name('projects.pdf');
Route::get('/projects/pdf/all', [ProjectController::class, 'generatePdfAll'])->name('projects.pdfAll');


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('forgot.password.post');
Route::get('/reset-password/{token}/{username}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password.post');
