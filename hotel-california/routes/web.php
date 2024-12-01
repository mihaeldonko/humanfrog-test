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

Route::get('/rooms', 'RoomController@index')->name('rooms');

Route::get('/reservation', 'RoomController@reservation')->middleware('auth')->name('reservation');

Route::post('/reservations', 'RoomController@makeReservation')->middleware('auth')->name('reservations.store');

Route::get('/admin/rooms', 'AdminController@rooms')->middleware('admin')->name('admin-room');
Route::post('/admin/rooms', 'AdminController@updateRoom')->middleware('admin')->name('updateRoom');
Route::get('/admin/reservations', 'AdminController@reservations')->middleware('admin')->name('admin-reservations');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
