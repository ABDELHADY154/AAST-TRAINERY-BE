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
Route::get('/countriesList', 'API\V1\StudentDepartmentController@countriesList')->name('countries-list');
Route::get('/stateList/{code}', 'API\V1\StudentDepartmentController@states')->name('cities-list');
//WEB API //
Route::group([
    'prefix' => '/W',
], function () {
    Route::get('/landingCount', 'API\V1\InternshipPostController@getLandingCounts');
    Route::get('/landingLogoes', 'API\V1\InternshipPostController@getLandingLogoes');
    Route::group(['middleware' => ['studentAuth']], function () {
        Route::get('/studentImg', 'API\V1\StudentController@getImg')->name('student.get.image');
        Route::get('/activity', 'API\V1\StudentActivityController@homeActivity')->name('Home.activity.section');
        Route::get('/coaches', 'API\V1\CareerCoachingController@getAllCoaches')->name('get.all.coaches');
        Route::get('/sessions', 'API\V1\CareerCoachingController@getAllSessions')->name('get.all.sessions');
        Route::get('/session/{id}', 'API\V1\CareerCoachingController@getSession')->name('get.session');
        Route::post('/bookSession/{id}', 'API\V1\CareerCoachingController@bookSession')->name('book.sessioon');
        Route::post('/bookSession/cancelBooking/{id}', 'API\V1\CareerCoachingController@unBookSession')->name('unbook.sessioon');
        Route::prefix('student')->group(function () {
            Route::get('/get-profile', 'API\V1\StudentController@getProfile')->name('get-profile');
            Route::get('/company/{id}', 'API\V1\CompanyController@show')->name('get.company.profile');
            Route::get('/posts', 'API\V1\InternshipPostController@getAllPostsExplore')->name('get.all.posts.explore');
            Route::get('/search/{val}', 'API\V1\InternshipPostController@search')->name('search');
            Route::post('/filterDep/{val}', 'API\V1\InternshipPostController@filterByDep')->name('filter.dep');
            Route::post('/filterState/{val}', 'API\V1\InternshipPostController@filterByState')->name('filter.state');
            Route::post('/filterPay/{val}', 'API\V1\InternshipPostController@filterByPay')->name('filter.pay');
            Route::post('/save/{postId}', 'API\V1\InternshipPostController@savePost')->name('student.savePost');
            Route::post('/unsave/{postId}', 'API\V1\InternshipPostController@unSavePost')->name('student.unSavePost');
            Route::get('/saved', 'API\V1\InternshipPostController@getSavedPosts')->name('student.get.saved.posts');
            Route::get('/post/{id}', 'API\V1\InternshipPostController@show')->name('get.post');
            Route::post('/apply/{postId}', 'API\V1\InternshipPostController@apply')->name('student.apply');
            Route::post('/unApply/{postId}', 'API\V1\InternshipPostController@unApply')->name('student.unApply');
            Route::get('/applied', 'API\V1\InternshipPostController@studentApplicationsPosts')->name('student.get.applciations');
            Route::get('/advisor/{id}', 'API\V1\TrainingAdvisorController@show')->name('get.advisor.profile');
            Route::get('/studentApplied', 'API\V1\StudentActivityController@getAppliedPosts')->name('student.get.applied.posts');
            Route::get('/studentAccepted', 'API\V1\StudentActivityController@getAcceptedPosts')->name('student.get.accepted.posts');
            Route::get('/studentSaved', 'API\V1\StudentActivityController@getSavedPosts')->name('student.activity.get.saved.posts');
            Route::get('/studentSessions', 'API\V1\StudentActivityController@getStudentSessions')->name('student.activity.get.sessions');
            Route::post('/review/{postId}', 'API\V1\StudentReviewsController@reviewPost')->name('student.review.post');
            Route::get('/review/{postId}', 'API\V1\StudentReviewsController@getAllPostReviews')->name('get.student.reviews');
            Route::post('/sessionReview/{sessionId}', 'API\V1\StudentReviewsController@reviewSession')->name('student.review.session');
            Route::get('/sessionReview/{sessionId}', 'API\V1\StudentReviewsController@getAllSessionReviews')->name('get.student.session.reviews');
            Route::get('/careerCoachingReviews', 'API\V1\StudentReviewsController@getAllCareerCoachingReviews')->name('get.student.careerCoaching.reviews');
            Route::get('/notifications', 'API\V1\StudentNotificationController@index')->name('get.student.notifications');
            Route::get('/subscribe', 'API\V1\StudentSubscribeController@subscribe')->name('student.subscribe');
            Route::get('/unsubscribe', 'API\V1\StudentSubscribeController@unSubscribe')->name('student.unsubscribe');
            Route::prefix('profile')->group(function () {
                Route::post('/general', 'API\V1\StudentProfileController@generalInfo')->name('student.update.general.info');
                Route::get('/general', 'API\V1\StudentProfileController@getGeneralInfo')->name('student.get.general.info');
                Route::apiResource('/education', 'API\V1\StudentEducationController')->except(['update']);
                Route::post('/education/{id}', 'API\V1\StudentEducationController@update')->name('student.edu.update');
                Route::apiResource('/experience', 'API\V1\StudentWorkExperienceController')->except(['update']);
                Route::post('/experience/{id}', 'API\V1\StudentWorkExperienceController@update')->name('student.exp.update');
                Route::apiResource('/course', 'API\V1\StudentCourseController')->except(['update']);
                Route::post('/course/{id}', 'API\V1\StudentCourseController@update')->name('student.course.update');
                Route::apiResource('/skill', 'API\V1\StudentSkillController');
                Route::apiResource('/interest', 'API\V1\StudentInterestController')->except(["update"]);
                Route::put('/interest', 'API\V1\StudentInterestController@update')->name('student.update.interest');
                Route::apiResource('/language', 'API\V1\StudentLanguageController');
                Route::apiResource('/account', 'API\V1\StudentAccountController')->except(['update', 'show', 'destroy']);
            });
        });
    });
});

//APP API //
Route::group([
    'middleware' => ['studentAuth'],
    'prefix' => '/A',
    'as' => 'app.'
], function () {
    Route::get('/sessions', 'API\V1\CareerCoachingController@mGetAllSessions')->name('get.all.sessions');
    Route::get('/session/{id}', 'API\V1\CareerCoachingController@mGetSession')->name('get.session');
    Route::post('/bookSession/{id}', 'API\V1\CareerCoachingController@mBookSession')->name('book.sessioon');
    Route::post('/bookSession/cancelBooking/{id}', 'API\V1\CareerCoachingController@mUnBookSession')->name('unbook.sessioon');
    Route::prefix('student')->group(function () {
        Route::get('/get-profilePersonal', 'API\V1\Mobile\StudentController@getProfile')->name('get-profilePersonal');
        Route::get('/get-profileExperience', 'API\V1\Mobile\StudentController@getProfileExperience')->name('get-profileExperience');
        Route::get('/studentImg', 'API\V1\Mobile\StudentController@getImg')->name('student.get.image');
        Route::get('/company/{id}', 'API\V1\CompanyController@mshow')->name('A.get.company.profile');
        Route::get('/post/{id}', 'API\V1\InternshipPostController@mshow')->name('A.get.post');
        Route::get('/posts', 'API\V1\InternshipPostController@mGetAllPostsExplore')->name('A.get.all.posts.explore');
        Route::get('/advisor/{id}', 'API\V1\TrainingAdvisorController@mshow')->name('A.get.advisor.profile');
        Route::get('/search/{val}', 'API\V1\InternshipPostController@mSearch')->name('A.search');
        Route::post('/filterDep/{val}', 'API\V1\InternshipPostController@filterByDep')->name('filter.dep');
        Route::post('/filterState/{val}', 'API\V1\InternshipPostController@filterByState')->name('filter.state');
        Route::post('/filterPay/{val}', 'API\V1\InternshipPostController@filterByPay')->name('filter.pay');
        Route::post('/save/{postId}', 'API\V1\InternshipPostController@mSavePost')->name('student.savePost');
        Route::post('/unsave/{postId}', 'API\V1\InternshipPostController@mUnSavePost')->name('student.unSavePost');
        Route::get('/saved', 'API\V1\InternshipPostController@getSavedPosts')->name('student.get.saved.posts');
        Route::post('/apply/{postId}', 'API\V1\InternshipPostController@mApply')->name('student.mapply');
        Route::post('/unApply/{postId}', 'API\V1\InternshipPostController@mUnApply')->name('student.munApply');
        Route::get('/applied', 'API\V1\InternshipPostController@studentApplicationsPosts')->name('student.mGet.applciations');
        Route::get('/studentApplied', 'API\V1\StudentActivityController@mGetAppliedPosts')->name('student.mGet.applied.posts');
        Route::get('/studentAccepted', 'API\V1\StudentActivityController@mGetAcceptedPosts')->name('student.mGet.accepted.posts');
        Route::get('/studentSaved', 'API\V1\StudentActivityController@mGetSavedPosts')->name('student.mGet.saved.posts');
        Route::get('/studentSessions', 'API\V1\StudentActivityController@mGetStudentSessions')->name('student.activity.get.sessions');
        Route::post('/review/{postId}', 'API\V1\StudentReviewsController@mReviewPost')->name('student.review.post');
        Route::get('/review/{postId}', 'API\V1\StudentReviewsController@mGetAllPostReviews')->name('get.student.reviews');
        Route::post('/sessionReview/{sessionId}', 'API\V1\StudentReviewsController@reviewSession')->name('student.review.session');
        Route::get('/sessionReview/{sessionId}', 'API\V1\StudentReviewsController@getAllSessionReviews')->name('get.student.session.reviews');
        Route::get('/careerCoachingReviews', 'API\V1\StudentReviewsController@getAllCareerCoachingReviews')->name('get.student.careerCoaching.reviews');
        Route::get('/notifications', 'API\V1\StudentNotificationController@index')->name('get.student.notifications');
        Route::get('/subscribe', 'API\V1\StudentSubscribeController@subscribe')->name('student.subscribe');
        Route::get('/unsubscribe', 'API\V1\StudentSubscribeController@unSubscribe')->name('student.unsubscribe');
        Route::prefix('profile')->group(function () {
            Route::put('/personal', 'API\V1\Mobile\StudentProfileController@personalInfo')->name('student.update.personal.info');
            Route::post('/image', 'API\V1\Mobile\StudentProfileController@updateImage')->name('student.update.profile.image');
            Route::put('/academic', 'API\V1\Mobile\StudentProfileController@academicInfo')->name('student.update.academic.info');
            Route::get('/personal', 'API\V1\Mobile\StudentProfileController@getPersonalInfo')->name('student.get.personal.info');
            Route::get('/academic', 'API\V1\Mobile\StudentProfileController@getAcademicInfo')->name('student.get.academic.info');
            Route::apiResource('/education', 'API\V1\Mobile\StudentEducationController')->except(['update']);
            Route::post('/education/{id}', 'API\V1\Mobile\StudentEducationController@update')->name('student.edu.update');
            Route::apiResource('/experience', 'API\V1\Mobile\StudentWorkExperienceController')->except(['update']);
            Route::post('/experience/{id}', 'API\V1\Mobile\StudentWorkExperienceController@update')->name('student.exp.update');
            Route::apiResource('/course', 'API\V1\Mobile\StudentCourseController')->except(['update']);
            Route::post('/course/{id}', 'API\V1\Mobile\StudentCourseController@update')->name('student.course.update');
            Route::apiResource('/skill', 'API\V1\Mobile\StudentSkillController');
            Route::apiResource('/interest', 'API\V1\Mobile\StudentInterestController')->except(["update"]);
            Route::put('/interest', 'API\V1\Mobile\StudentInterestController@update')->name('student.update.interest');
            Route::apiResource('/language', 'API\V1\Mobile\StudentLanguageController');
            Route::apiResource('/account', 'API\V1\Mobile\StudentAccountController')->except(['update', 'show', 'destroy']);
        });
    });
});

// fallback route////  $todo : make a fallback function in a controller of the student
Route::fallback(function () {
    $message = [
        'error' => 'Route is not found'
    ];
    return $message;
});
