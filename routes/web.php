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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('route-1', function () {
    return "masuk sebagai admin";
})->middleware(['admin', 'email', 'auth']);

Route::get('route-2', function () {
    return "masuk sebagai admin";
})->middleware(['email', 'auth']);


Route::get('/post', function() {
    $a = [
        [
            'title' => 'Belajar VueJS',
            'author'    => 'Daengweb.id'
        ],
        [
            'title' => 'Belajar Laravel',
            'author'    => 'Anugrah Sandi'
        ],
        [
            'title' => 'Belajar Javascript',
            'author'    => 'Daengweb.id'
        ],
        [
            'title' => 'Belajar PHP',
            'author'    => 'Daengweb.id'
        ],
        [
            'title' => 'Belajar HTML',
            'author'    => 'Daengweb.id'
        ]
    ];
    return $a;
});









