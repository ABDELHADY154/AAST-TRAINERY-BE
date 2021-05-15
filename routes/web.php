<?php

use App\Http\Controllers\SessionController;
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
    Route::resource('/coach', 'CoachController')->except(['store', 'update']);
    Route::resource('/trainingAdvisorPost', 'TrainingAdvisorPostsController');
    Route::resource('/companyInternshipPost', 'CompanyInternshipPostController');
    Route::resource('/session', 'SessionController')->except(['store', 'update']);
    Route::resource('/promotedPost', 'PromotedPostsController');
    Route::resource('/adsPost', 'AdsPostController')->except(["store", "update", "edit"]);
    Route::resource('/student', 'StudentController');
    Route::resource('/internshipReview', 'InternshipPostReviewController')->except(['store', 'update']);
    Route::resource('/sessionReview', 'SessionReviewController')->except(['store', 'update']);
    Route::get('/acceptStudent', 'CompanyInternshipPostController@acceptStudent')->name('accept.student');
    Route::get('/rejectStudent', 'CompanyInternshipPostController@rejectStudent')->name('reject.student');
    Route::get('/acceptStudentSession', 'SessionController@acceptStudent')->name('accept.student.session');
    Route::get('/rejectStudentSession', 'SessionController@rejectStudent')->name('reject.student.session');
    Route::get('/internAchievedSession', 'SessionController@sessionAchieved')->name('student.achieved.intern.session');
    Route::get('/internAchieved', 'CompanyInternshipPostController@internAchieved')->name('student.achieved.intern');
});
