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

Route::get('register', [RegistrationController::class, 'create'])->name('user.create');
Route::post('register', [RegistrationController::class, 'store'])->name('user.store');
Route::view('login', 'login')->name('user.login');

Route::get('list-users', [UserController::class, 'index'])->name('user.list');
Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('verify', [UserController::class, 'verify'])->name('user.verify');
Route::post('edit-user', [UserController::class, 'update'])->name('user.update');
Route::post('delete', [UserController::class, 'delete'])->name('user.delete');
Route::post('auth', [UserController::class, 'login'])->name('user.auth');

Route::get('create-internship', [InternshipController::class, 'create'])->name('internship.create');
Route::post('create-internship', [InternshipController::class, 'store'])->name('internship.store');
Route::get('list-internships', [InternshipController::class, 'index'])->name('internship.list');
Route::delete('delete-internship', [InternshipController::class, 'destroy'])->name('internship.delete');
Route::get('edit-internship/{id}', [InternshipController::class, 'edit'])->name('internship.edit');
Route::post('edit-internship', [InternshipController::class, 'update'])->name('internship.update');

Route::get('list-companies', [CompanyController::class, 'index'])->name('company.list');
Route::delete('delete-company', [CompanyController::class, 'destroy'])->name('company.delete');
Route::get('edit-company/{id}', [CompanyController::class, 'edit'])->name('company.edit');
Route::post('edit-company', [CompanyController::class, 'update'])->name('company.update');
Route::get('create-company', [CompanyController::class, 'create'])->name('company.create');
Route::post('create-company', [CompanyController::class, 'store'])->name('company.store');

//Auth::routes();

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
