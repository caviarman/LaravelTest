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

Route::get('/home/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect()->route('games.show');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/games', 'GameController@index')->name('games.show');
Route::get('/games/new', 'GameController@create')->name('games.new');
Route::post('/games', 'GameController@store')->name('games.store');
Route::get('/games/{id}/run', 'GameController@run')->name('game.run');
Route::post('/logs', 'LogController@store')->name('log.store');
Route::get('/logs', 'LogController@index')->name('log.show');
Route::get('/users', 'UserController@index')->name('users.show');
