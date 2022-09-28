<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);
//Route::view('/list', 'list', ['users' => User::paginate()]);
Route::view('/list', 'list', ['users' => DB::table('users')->paginate(5)]);
Route::get('/user/{id}', function (Request $request, $id) {
    return view('user', ['user' => User::find($id)]);
});
Route::post('/verify', [UserController::class, 'verify']);
Route::post('/edit', [UserController::class, 'edit']);
Route::post('/delete', [UserController::class, 'delete']);
Route::view('/login', 'login');
Route::post('/auth', [UserController::class, 'login']);


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
