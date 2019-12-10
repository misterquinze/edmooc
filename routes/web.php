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
Route::get('/course/{id}/preview', 'VisitorController@getCoursePreview');
Route::get('/enroll', 'StudentController@enroll')->name('enroll');
Route::get('/about', 'VisitorController@getAbout');
Route::get('/contact', 'VisitorController@getContact');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@getDashboard');
    Route::get('/dashboard/settings', 'DashboardController@getSettings');

    // Student
    Route::get('/dashboard/course/me', 'StudentController@getMyCourse');
    Route::get('/dashboard/favorite', 'StudentController@getFavorite');

    Route::post('favorite/{course}', 'StudentController@favoriteCourse');
    Route::post('unfavorite/{course}', 'StudentController@unFavoriteCourse');
    
    Route::get('/enroll/{id}', 'StudentController@enroll')->name('enroll');
    Route::get('/unenroll/{id}', 'StudentController@unenroll')->name('unenroll');

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
    
    Route::post('/classroom/{id}/topic',  'TutorController@createTopic');
    Route::get('/dashboard/topic/{topicId}/edit', 'TutorController@getEditTopicForm');
    Route::put('/dashboard/topic/{topicId}/edit', 'TutorController@updateTopic')
    ->name('topic.update');
    Route::delete('/dashboard/topic/{topicId}/delete', 'TutorController@deleteTopic')->name('topic.delete');

    
    Route::get('content', 'ContentsController@index')->name('content.index');
    Route::get('content/create', 'ContentsController@create')->name('content.create');
    Route::post('content', 'ContentsController@store')->name('content.store');
    Route::get('content/{content}', 'ContentsController@show')->name('content.show');
    Route::get('content/{content}/edit', 'ContentsController@edit')->name('content.edit');
    Route::patch('content/{content}', 'ContentsController@update')->name('content.update');
    Route::delete('contents/{contents}', 'ContentsController@delete')->name('contents.delete');
    
    
 
    // Tutor & Student
    Route::get('/classroom/{id}/overview', 'ClassController@getOverview');
    Route::get('/classroom/{topicId}/topic', 'ClassController@getTopic')->name('topic');
    Route::get('/classroom/{discId}/discussion', 'ClassController@getDiscussion');
    Route::get('/classroom/{taskId}/task', 'ClassController@getTask');

    Route::get('/tutor/course', 'TutorController@getCourse');
});
