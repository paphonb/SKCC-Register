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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/test', function (Request $request) {
    return $request->toArray();
});
// Judge API System
Route::middleware('auth:api')->post('/judge/result/progress', 'JudgeResultController@progress');
Route::middleware('auth:api')->post('/judge/result/submit', 'JudgeResultController@submit');

Route::group([
        'middleware' => ['cors', 'auth:api'],
    ], function ($router) {
        Route::get('/userinfo', 'AuthController@userinfo');
        Route::get('/contest', 'ContestController@index')->name('contest');
        Route::get('/contest/view/{id}', 'ContestController@view')->name('contest-view');
        Route::get('/task/view/{codeName}', 'TaskController@view')->name('task-view');
    }
);

Route::group([
        'middleware' => ['cors'],
    ], function ($router) {
        Route::post('/auth', 'AuthController@login');
        Route::options('{any}', function () {
            $response = Response::make('');

            $response->header('Access-Control-Allow-Origin', '*');
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization');
            $response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
            $response->header('Access-Control-Allow-Credentials', 'true');
            $response->header('X-Content-Type-Options', 'nosniff');

            return $response;
        })->where('any', '.*');
    }
);