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
    Route::get('user-edit/{id}', 'edit')->name('user.edit');
    Route::post('verify/{id}', 'verify')->name('user.verify');
    Route::post('user-edit/{id}', 'update')->name('user.update');
    Route::delete('user-delete/{id}', 'delete')->name('user.delete');
    Route::get('password-change', 'edit_password')->name('user.edit_password');
    Route::post('password-change', 'update_password')->name('user.update_password');
});

Route::controller(UserController::class)->group(function() {
    Route::get('register', 'create')->name('user.create');
    Route::post('register', 'store')->name('user.store');
    Route::get('login', 'signin')->name('login');
    Route::post('auth', 'login')->name('user.auth');
    Route::get('logout', 'logout')->name('user.logout');
});

Route::get('profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::get('edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_profile')->middleware('auth');

Route::controller(InternshipController::class)->group(function () {
    Route::get('internship-create', 'create')->name('internship.create');
    Route::post('internship-create', 'store')->name('internship.store');
    Route::get('internship-list/{filter?}', 'index')->name('internship.list');
    Route::delete('internship-delete/{id}', 'destroy')->name('internship.delete');
    Route::get('internship-edit/{id}', 'edit')->name('internship.edit');
    Route::post('internship-edit/{id}', 'update')->name('internship.update');
});

Route::middleware(['auth', 'IsAdmin'])->controller(CompanyController::class)->group(function () {
    Route::get('company-list', 'index')->name('company.list');
    Route::delete('company-delete/{id}', 'destroy')->name('company.delete');
    Route::get('company-edit/{id}', 'edit')->name('company.edit');
    Route::post('company-edit/{id}', 'update')->name('company.update');
    Route::get('company-create', 'create')->name('company.create');
    Route::post('company-create', 'store')->name('company.store');
});
//Auth::routes();

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
