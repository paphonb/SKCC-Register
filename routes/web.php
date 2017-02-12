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
    return view('index');
});

// SKOI
Route::get('/skoi','SKOIController@index')->name('skoi');
Route::get('/skoi/register','SKOIController@register')->name('skoi-register');
Route::post('/skoi/register','SKOIController@registerSubmit');

// SKIT
Route::get('/skit','SKITController@index')->name('skit');
Route::get('/skit/register','SKITController@register')->name('skit-register');
Route::post('/skit/register','SKITController@registerSubmit');

// Game Master Camp
Route::get('/game-master','GameMasterCampController@index');
Route::get('/game-master/register','GameMasterCampController@register');
