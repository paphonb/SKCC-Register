<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/test', function (Request $request) {
    return $request->toArray();
});
// Judge API System
Route::middleware('auth:grader')->post('/judge/result/progress', 'JudgeResultController@progress');
Route::middleware('auth:grader')->post('/judge/result/submit', 'JudgeResultController@submit');

Route::group([
        'middleware' => ['auth:api'],
    ], function ($router) {
        Route::get('/user', 'AuthController@user');

        Route::get('/contest', 'ContestController@index')->name('contest');
        Route::get('/contest/view/{id}', 'ContestController@view')->name('contest-view');
        Route::get('/contest/scoreboard/{id}', 'ContestController@scoreboard')->name('contest-scoreboard');

        Route::get('/task/view/{codeName}', 'TaskController@view')->name('task-view');
        Route::post('/task/submit/{codeName}', 'TaskController@postSubmit')->name('task-submit-post');

        Route::get('/status', 'StatusController@index')->name('status');

        Route::get('/message', 'MessageController@index')->name('message');
        Route::post('/message/submit', 'MessageController@postMessage')->name('submit-message');
    }
);
