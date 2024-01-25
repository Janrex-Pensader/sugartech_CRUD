<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
Route::controller(UserController::class)->group(function() {
    Route::get('/jarx',  'show');
    Route::get('/users', 'getUsers');
    Route::get('/get-user/{id}', 'getUserByID');
    Route::post('/add-user', 'addUser');
    Route::post('/edit-user/{id}', 'editUser');
    Route::post('/delete-user/{id}', 'deleteUser');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'loginGet')->name('login');
    Route::post('login', 'loginPost');
    Route::get('logout','logout')->name('logout');
});


