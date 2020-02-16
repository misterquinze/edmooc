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
    Route::get('/dashboard/tutor/course/list', 'TutorController@getMyCourse');
    // Tutor - Topic
    Route::get('/dashboard/tutor/course/{id}/overview', 'TutorController@getTopicList')->name('tutor.topic.index');
    Route::post('/dashboard/tutor/topic/{topicId}',  'TutorController@storeTopic')->name('tutor.topic.store');
    Route::put('/dashboard/tutor/topic/{topicId}/edit', 'TutorController@updateTopic')->name('tutor.topic.update');
    Route::delete('/dashboard/tutor/topic/{topicId}/delete', 'TutorController@deleteTopic')->name('tutor.topic.delete');
    // Tutor - Topic Content
    Route::get('/dashboard/tutor/topic/{topicId}', 'TutorController@getContentList')->name('tutor.content.index');
    Route::get('/dashboard/tutor/content/{contentId}', 'TutorController@getContentDetail')->name('tutor.content.detail');
    Route::get('/dashboard/tutor/topic/{topicId}/content/create', 'TutorController@createContentForm')->name('tutor.content.create');
    Route::post('/dashboard/tutor/topic/{topicId}/content/create', 'TutorController@storeContent')->name('tutor.content.store');
    Route::get('/dashboard/tutor/content/{contentId}/edit', 'TutorController@editContentForm')->name('tutor.content.edit');
    Route::patch('/dashboard/tutor/content/{contentId}/edit', 'TutorController@updateContent')->name('tutor.content.update');
    Route::delete('/dashboard/tutor/content/{contentId}', 'TutorController@deleteContent')->name('tutor.content.delete');
    // Tutor - Topic Quiz
    Route::get('/dashboard/tutor/quiz/{quizId}', 'TutorController@getQuizDetail')->name('tutor.quiz.index');
    Route::get('/dashboard/tutor/topic/{topicId}/quiz/create', 'TutorController@getQuizForm')->name('tutor.quiz.create');
    Route::post('/dashboard/tutor/{topicId}/quiz/create', 'TutorController@store')->name('tutor.quiz.store');
    Route::get('/dashboard/tutor/{topicId}/quiz/edit', 'TutorController@getEditQuizForm')->name('tutor.quiz.dit');
    Route::put('/dashboard/tutor/{topicId}/quiz/edit', 'TutorController@update')->name('tutor.quiz.update');
    Route::get('/dashboard/tutor/quiz/{quizId}/result', 'TutorController@getAnswerList')->name('tutor.quiz.answer.list');
    Route::get('/dashboard/tutor/quiz/result/{resultId}', 'TutorController@getAnswerDetail')->name('tutor.quiz.answer.index');
    Route::put('/dashboard/tutor/quiz/result/{resultId}/score', 'TutorController@updateScore')->name('tutor.quiz.score');


    // Route::get('/classroom/topic/{topicId}', 'ClassController@getTopic')->name('topic.index');
    // Route::post('/classroom/{id}/topic',  'TutorController@createTopic')->name('topic.create');
    // Route::get('/classroom/topic/{topicId}/edit', 'TutorController@getEditTopicForm')->name('topic.edit');
    // Route::put('/dashboard/topic/{topicId}/edit', 'TutorController@updateTopic')->name('topic.update');
    // Route::delete('/classroom/{topicId}/delete', 'TutorController@deleteTopic')->name('topic.delete');

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
