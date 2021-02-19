<?php


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


Route::post('/login', 'Auth\LoginController@studentLogin')->name('student-login');
Route::post('/register', 'Auth\RegisterController@studentRegister')->name('student-register');
Route::post('/forgot', 'ForgotPasswordController@forgot')->name('forgot-password');
Route::get('/students', 'API\V1\StudentController@index')->name('students-list');
Route::get('/departments', 'API\V1\StudentDepartmentController@index')->name('departments-list');


//WEB API //
Route::group([
    'prefix' => '/W',
], function () {
    Route::get('/landingCount', 'API\V1\InternshipPostController@getLandingCounts');
    Route::group(['middleware' => ['studentAuth']], function () {
        Route::get('/studentImg', 'API\V1\StudentController@getImg')->name('student.get.image');
        Route::get('/get-profile', 'API\V1\StudentController@getProfile')->name('get-profile');
        Route::prefix('student')->group(function () {
            Route::prefix('profile')->group(function () {
                Route::post('/general', 'API\V1\StudentProfileController@generalInfo')->name('student.update.general.info');
                Route::apiResource('/education', 'API\V1\StudentEducationController')->except(['update']);
                Route::post('/education/{id}', 'API\V1\StudentEducationController@update')->name('student.edu.update');
            });
        });
    });
});

//APP API //
Route::group([
    'middleware' => ['studentAuth'],
    'prefix' => '/A',
], function () {
    Route::get('/get-profile', 'API\V1\Mobile\StudentController@getProfile')->name('get-profile');
});

// fallback route////  $todo : make a fallback function in a controller of the student
Route::fallback(function () {
    $message = [
        'error' => 'Route is not found'
    ];
    return $message;
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
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return new StudentResource($request->user());
// });
