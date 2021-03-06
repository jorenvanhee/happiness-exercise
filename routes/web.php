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

Route::get('/', ['uses' => 'Front\VotesController@create'])->name('front.votes.create');
Route::post('votes', ['uses' => 'Front\VotesController@store'])->name('front.votes.store');

Auth::routes();

Route::group(['namespace' => 'Back', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'VotesController@index'])->name('back.votes.index');
});
