<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//use App\Models\Company;

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
    return view('home');
});

Route::get('register', [UserController::class, 'create'])->name('user.create');
Route::post('register', [UserController::class, 'store'])->name('user.store');
Route::view('login', 'login')->name('user.login');

Route::get('user-list', [UserController::class, 'index'])->name('user.list');
Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('verify', [UserController::class, 'verify'])->name('user.verify');
Route::post('user-edit', [UserController::class, 'update'])->name('user.update');
Route::delete('user-delete', [UserController::class, 'delete'])->name('user.delete');
Route::post('auth', [UserController::class, 'login'])->name('user.auth');

Route::get('internship-create', [InternshipController::class, 'create'])->name('internship.create');
Route::post('internship-create', [InternshipController::class, 'store'])->name('internship.store');
Route::get('internship-list', [InternshipController::class, 'index'])->name('internship.list');
Route::delete('internship-delete', [InternshipController::class, 'destroy'])->name('internship.delete');
Route::get('internship-edit/{id}', [InternshipController::class, 'edit'])->name('internship.edit');
Route::post('internship-edit', [InternshipController::class, 'update'])->name('internship.update');

Route::get('company-list', [CompanyController::class, 'index'])->name('company.list');
Route::delete('company-delete', [CompanyController::class, 'destroy'])->name('company.delete');
Route::get('company-edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
Route::post('company-edit', [CompanyController::class, 'update'])->name('company.update');
Route::get('company-create', [CompanyController::class, 'create'])->name('company.create');
Route::post('company-create', [CompanyController::class, 'store'])->name('company.store');
Route::view('email', 'newuser_admin_notification');

//Auth::routes();

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
