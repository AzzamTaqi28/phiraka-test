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

Route::get('/fibonacci',function(){
    return view('fibonacci');
});
Route::post('/get-fibonacci', 'FibonacciController@generateFibonacciNum')->name('get-fibonacci');

// route login
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/signin', 'AuthController@login')->name('signin');

Route::get('/register', 'AuthController@indexRegister')->name('register');
Route::post('/create', 'AuthController@create')->name('create-account');
Route::get('/edit/{id}', 'DashboardController@edit')->name('edit-account');
Route::post('/update', 'AuthController@update')->name('edit');

Route::get('/delete-account', 'AuthController@delete')->name('delete-account');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');