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

Auth::routes();

Route::get('/home', 'TicketsController@index')->name('home');

Route::resource('users', 'UsersController');
Route::resource('tickets', 'TicketsController');
Route::get('tickets/close/{ticket}', 'TicketsController@close')->name('tickets.close');
Route::get('tickets/open/{ticket}', 'TicketsController@open')->name('tickets.open');
Route::get('tickets/reopen/{ticket}', 'TicketsController@reopen')->name('tickets.reopen');