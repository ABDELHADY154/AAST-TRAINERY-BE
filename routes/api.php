<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group([
    'middleware' => ['studentAuth']
], function () {
    Route::get('/get-profile', 'API\V1\StudentController@getProfile')->name('get-profile');
    Route::get('/students', 'API\V1\StudentController@index')->name('students-list');
});


Route::post('/login', 'Auth\LoginController@studentLogin')->name('student-login');
Route::post('/register', 'Auth\RegisterController@studentRegister')->name('student-register');
