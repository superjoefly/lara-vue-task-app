<?php

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


// Resource Route for Tasks
Route::resource('/task', 'TaskController');







// Adminer
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerAutologinController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
