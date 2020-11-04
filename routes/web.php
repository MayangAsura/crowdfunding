<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['emailMid', 'auth'])->group(function(){
    Route::get('route-1', 'AdminController@room1');
});
Route::middleware(['adminMid', 'emailMid' , 'auth'])->group(function(){
    Route::get('route-2', 'AdminController@room2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
