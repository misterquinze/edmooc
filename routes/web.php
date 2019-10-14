<?php

// Auth::routes();

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'VisitorController@getHomepage');
Route::get('/course', 'VisitorController@getCourses');
Route::get('/enroll', 'StudentController@enroll')->name('enroll');
Route::get('/about', 'VisitorController@getAbout');
Route::get('/contact', 'VisitorController@getContact');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/dashboard', 'DashboardController@getDashboard');
    Route::get('/dashboard/settings', 'DashboardController@getSettings');

    // Student
    Route::get('/dashboard/favorite', 'StudentController@getFavorite');
    Route::get('dashboard/student/course/{id}', 'StudentController@enroll')->name('enroll');
    Route::get('/dashboard/course/me', 'StudentController@getMyCourse');
    Route::get('/dashboard/transaction', 'StudentController@getTransaction');
    
    // Company
    Route::get('/dashboard/course/list', 'CompanyController@getMyCourse');
    Route::post('/dashboard/course/list', 'CompanyController@createCourse');
    Route::get('/dashboard/course/{id}/edit', 'CompanyController@getEditCourseForm');
    Route::put('/dashboard/course/{id}/edit', 'CompanyController@updateCourse');
    Route::delete('/dashboard/course/{id}/delete', 'CompanyController@deleteCourse');
    Route::get('/dashboard/revenue', 'CompanyController@getRevenue');
    
    // Tutor
    Route::get('/dashboard/list/course', 'TutorController@getMyCourse');
    
    Route::post('/dashboard/course/{id}/topic',  'TutorController@createTopic');
    Route::get('/dashboard/course/{id}/edit', 'TutorController@getEditTopicForm');
    Route::put('/dashboard/course/{id}/edit', 'TutorController@updateTopic');
    Route::delete('/dashboard/course/{id}/delete', 'TutorController@deleteTopic');



 

    Route::get('/classroom/{id}/overview', 'ClassController@getOverview');
    Route::get('/classroom/{id}/topic/{topicId}', 'ClassController@getTopic');
    Route::get('/classroom/{id}/discussion', 'ClassController@getDiscussion');
    Route::get('/classroom/{id}/task', 'ClassController@getTask');

    Route::get('/tutor/course', 'TutorController@getCourse');
});
