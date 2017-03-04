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
    //return view('index');
    return '';
});

// SKOI
//Route::get('/skoi','SKOIController@index')->name('skoi');
Route::get('/skoi/register','SKOIController@register')->name('skoi-register');
Route::post('/skoi/register','SKOIController@registerSubmit');

// SKIT
//Route::get('/skit','SKITController@index')->name('skit');
Route::get('/skit/register','SKITController@register')->name('skit-register');
Route::post('/skit/register','SKITController@registerSubmit');

// Game Master Camp
Route::get('/game-master','GameMasterCampController@index');
Route::get('/game-master/register','GameMasterCampController@register');

// Authentication
Auth::routes();
Route::get('/home', 'HomeController@index');

// Task
Route::get('/skoi/task', 'TaskController@index')->name('task');
Route::get('/skoi/task/description/{codeName}', 'TaskController@description')->name('task-description');
Route::get('/skoi/task/submit/{codeName}', 'TaskController@getSubmit')->name('task-submit');
Route::post('/skoi/task/submit/{codeName}', 'TaskController@postSubmit')->name('task-submit-post');

// Scoreboard
Route::get('/skoi/scoreboard', function () {
    return view('layouts.app');
})->name('scoreboard');

// Contest
Route::get('/skoi/contest', 'ContestController@index')->name('contest');
Route::get('/skoi/contest/view/{id}', 'ContestController@view')->name('contest-view');
Route::post('/skoi/contest/enter/{id}', 'ContestController@enter')->name('contest-enter');
Route::post('/skoi/contest/leave/{id}', 'ContestController@leave')->name('contest-leave');

// TODO: Remove this ASAP
// List students
Route::get('/skoi/students-list', 'SKOIController@listStudents')->name('special-list-skoi');
Route::get('/skit/students-list', 'SKITController@listStudents')->name('special-list-skit');