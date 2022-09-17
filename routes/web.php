<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/suggestions', [App\Http\Controllers\UserController::class, 'index'])->name('suggestions')->middleware('auth');

Route::get('auth/google', 'App\Http\Controllers\Auth\RegisterController@redirectToGoogle');  
Route::get('auth/google/callback', 'App\Http\Controllers\Auth\RegisterController@handleGoogleCallback');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::get('/logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('adminLogout');
 
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.list');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.list');
        
        Route::get('/', function () {
            return view('admin/dashboard');
        })->name('adminDashboard');
 
    });
});
