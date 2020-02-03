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
    // Settings
    Route::get('/dashboard/settings', 'DashboardController@getSettings');
    Route::put('/dashboard/settings', 'DashboardController@updateProfile');


    // Student
    Route::get('/dashboard/course/me', 'StudentController@getMyCourse');
    Route::get('/dashboard/favorite', 'StudentController@getFavorite');

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
    Route::get('/classroom/topic/{topicId}', 'ClassController@getTopic')->name('topic.index');
    Route::post('/classroom/{id}/topic',  'TutorController@createTopic')->name('topic.create');
    Route::get('/classroom/topic/{topicId}/edit', 'TutorController@getEditTopicForm')->name('topic.edit');
    Route::put('/dashboard/topic/{topicId}/edit', 'TutorController@updateTopic')->name('topic.update');
    Route::delete('/classroom/{topicId}/delete', 'TutorController@deleteTopic')->name('topic.delete');

    // Content
    Route::get('classroom/topic/content/{contentId}', 'ContentsController@index')->name('content.index');
    Route::get('classroom/topic/{topicId}/content/create', 'ContentsController@create')->name('content.create');
    Route::post('classroom/topic/{topicId}/content', 'ContentsController@store')->name('content.store');
    Route::get('classroom/topic/content/{content}', 'ContentsController@show')->name('content.show');
    Route::get('classroom/topic/content/{content}/edit', 'ContentsController@edit')->name('content.edit');
    Route::patch('classroom/topic/content/{content}', 'ContentsController@update')->name('content.update');
    Route::delete('classroom/topic/contents/{contents}', 'ContentsController@delete')->name('content.delete');
    
    // Tutor & Student (Classroom)
    Route::get('/classroom/{id}/overview', 'ClassController@getOverview');
    
    
    Route::get('/classroom/{id}/forum', 'ClassController@getForum')->name('forum');
    
    Route::get('/classroom/discussion/{discId}', 'DiscussionController@index')->name('discussion.index');
    Route::get('/classroom/{id}/discussion', 'DiscussionController@create')->name('discussion.create');
    Route::post('/classroom/{id}/discussion', 'DiscussionController@store')->name('discussion.store');
    Route::get('/classroom/discussion/{discId}/edit', 'DiscussionController@edit')->name('discussion.edit');
    Route::put('/classroom/discussion/{discId}/edit', 'DiscussionController@update')->name('discussion.update');
    
    Route::get('/classroom/{taskId}/task', 'ClassController@getTask');

    Route::get('/tutor/course', 'TutorController@getCourse');


    
});
