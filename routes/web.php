<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes(['register' => false]);
Route::prefix('student')->group(function () {
    Route::get('/reset/{token}', 'ForgotPasswordController@resetForm')->name('student-reset-password');
    Route::post('/reset/{token}', 'ForgotPasswordController@reset')->name('student-reset-password-result');
});



/////////////////////
Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});
