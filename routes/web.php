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
})->name('home');

Route::middleware(['auth', 'IsAdmin'])->controller(UserController::class)->group(function () {
    Route::get('user-list', 'index')->name('user.list');
    Route::get('edit-user/{id}', 'edit')->name('user.edit');
    Route::post('verify', 'verify')->name('user.verify');
    Route::post('user-edit', 'update')->name('user.update');
    Route::delete('user-delete', 'delete')->name('user.delete');
    Route::post('auth', 'login')->name('user.auth');
    Route::get('password-change', 'edit_password')->name('user.edit_password');
    Route::post('password-change', 'update_password')->name('user.update_password');
});

Route::controller(UserController::class)->group(function() {
    Route::get('register', 'create')->name('user.create');
    Route::post('register', 'store')->name('user.store');
    Route::get('login', 'signin')->name('login');
    Route::get('logout', 'logout')->name('user.logout');
});

Route::get('profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

Route::controller(InternshipController::class)->group(function () {
    Route::get('internship-create', 'create')->name('internship.create');
    Route::post('internship-create', 'store')->name('internship.store');
    Route::get('internship-list', 'index')->name('internship.list');
    Route::delete('internship-delete', 'destroy')->name('internship.delete');
    Route::get('internship-edit/{id}', 'edit')->name('internship.edit');
    Route::post('internship-edit', 'update')->name('internship.update');
});

Route::middleware(['auth', 'IsAdmin'])->controller(CompanyController::class)->group(function () {
    Route::get('company-list', 'index')->name('company.list');
    Route::delete('company-delete', 'destroy')->name('company.delete');
    Route::get('company-edit/{id}', 'edit')->name('company.edit');
    Route::post('company-edit', 'update')->name('company.update');
    Route::get('company-create', 'create')->name('company.create');
    Route::post('company-create', 'store')->name('company.store');
});
//Auth::routes();

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
