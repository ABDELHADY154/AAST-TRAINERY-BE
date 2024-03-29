<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Sopamo\LaravelFilepond\Http\Controllers\FilepondController;

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


// Route::post('upload', 'UploadController@store');
// Route::prefix('api')->group(function () {
//     Route::post('/process', [FilepondController::class, 'upload'])->name('filepond.upload');
//     Route::delete('/process', [FilepondController::class, 'delete'])->name('filepond.delete');
// });
/////////////////////
Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/company', 'CompanyController');
    Route::resource('/trainingAdvisor', 'TrainingAdvisorController');
    Route::resource('/trainingAdvisorPost', 'TrainingAdvisorPostsController');
    Route::resource('/companyInternshipPost', 'CompanyInternshipPostController');
    Route::resource('/student', 'StudentController');
    Route::get('/acceptStudent', 'CompanyInternshipPostController@acceptStudent')->name('accept.student');
    Route::get('/rejectStudent', 'CompanyInternshipPostController@rejectStudent')->name('reject.student');
    Route::get('/internAchieved', 'CompanyInternshipPostController@internAchieved')->name('student.achieved.intern');
});
