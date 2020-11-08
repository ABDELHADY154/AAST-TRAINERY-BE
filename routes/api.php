<?php

use App\Http\Resources\StudentResource;
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

////AUTH/////
Route::post('/register', 'Auth\RegisterController@studentRegister')->name('student-register');
Route::post('/login', 'Auth\LoginController@studentLogin')->name('student-login');


Route::get('/students', 'API\V1\StudentController@index')->name('students-list');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return new StudentResource($request->user());
});


Route::group([
    'middleware' => ['studentAuth']
], function () {
    Route::get('/get-profile', 'API\V1\StudentController@getProfile')->name('get-profile');
});




///////////////////////////COMMENTED APIS//////////////////////
// Route::get('/colleges', 'API\V1\CollegeController@index')->name('colleges-list'); //removed

 // profile info test routes and will be removed later
    // Route::get('/student-workExperience', 'API\V1\WorkExperienceController@index')->name('students-workExperience');
    // Route::get('/student-profileCourses', 'API\V1\ProfileCourseController@index')->name('students-profileCourses');
    // Route::get('/student-skills', 'API\V1\StudentSkillController@index')->name('students-skills');
    // Route::get('/student-lang', 'API\V1\StudentLangController@index')->name('students-lang');
    // Route::get('/student-acc', 'API\V1\ProfileAccountsController@index')->name('students-account');
    // ----------------//
    // Route::get('/departments', 'API\V1\DepartmentController@index')->name('colleges-list'); //remove
    // Route::get('/reviews', 'API\V1\ReviewController@index')->name('reviews-list');
