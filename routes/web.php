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
Route::get('/course/search', 'VisitorController@search');
Route::get('/accourse/{id}/preview', 'VisitorController@getAcCoursePreview');
Route::get('/course/{id}/preview', 'VisitorController@getCoursePreview');
Route::get('/enroll', 'StudentController@enroll')->name('enroll');
Route::get('/about', 'VisitorController@getAbout');
Route::get('/contact', 'VisitorController@getContact');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@getDashboard');
    // Settings
    Route::get('/dashboard/settings', 'DashboardController@getSettings');
    Route::put('/dashboard/settings', 'DashboardController@updateProfile');

    // Company - Program
    Route::get('/dashboard/company/program', 'ProgramController@index')->name('program.index');
    Route::get('/dashboard/company/program', 'ProgramController@create')->name('program.create');
    Route::post('/dashboard/company/program', 'ProgramController@store')->name('program.store');
    Route::get('/dashboard/program/{id}/edit', 'ProgramController@edit')->name('program.edit');
    Route::put('/dashboard/program/{id}/edit', 'ProgramController@update')->name('program.update');
    Route::delete('/dashboard/program/{id}/delete', 'ProgramController@deleteProgram')->name('program.delete');
    Route::get('/dashboard/program/changeStatus', 'ProgramController@changeProgramStatus');
    Route::get('/dashboard/program/{id}/detail', 'ProgramController@programDetail')->name('program.detail');
    Route::get('/dashboard/program/search', 'ProgramController@searchProgram')->name('program.search');
    //Company - AcademicCourse
    Route::post('dashboard/program/{id}/detail', 'AcademicController@createAcCourse')->name('company.academic.create');
    Route::put('/dashboard/accourse/{id}/edit', 'AcademicController@updateAcCourse')->name('company.academic.update');
    Route::delete('/dashboard/accourse/{id}/delete', 'AcademicController@deleteAcCourse')->name('company.academic.delete');
    Route::get('/dashboard/accourse/changeStatus', 'AcademicController@changeAcCourseStatus');
    //Route::get('/dashboard/accourse/{id}/search', 'AcademicController@searchAcCourse');
    
    // Company - ProfessionalCourse
    Route::get('/dashboard/course/list', 'CompanyController@getMyCourse');
    Route::post('/dashboard/course/list', 'CompanyController@createCourse');
    Route::get('/dashboard/course/{id}/edit', 'CompanyController@getEditCourseForm');
    Route::put('/dashboard/course/{id}/edit', 'CompanyController@updateCourse');
    Route::delete('/dashboard/course/{id}/delete', 'CompanyController@deleteCourse');
    Route::get('/dashboard/course/changeStatus', 'CompanyController@changeCourseStatus');
    // Company - payment
    Route::get('/dashboard/revenue', 'CompanyController@getRevenue');
    
    Route::get('/dashboard/course/search', 'CompanyController@searchCourse');

    // Tutor
    Route::get('/dashboard/tutor/course/list', 'TutorController@getMyCourse');
    
    // Tutor - ProfessionalTopic
    Route::get('/dashboard/tutor/course/{id}/overview', 'TutorController@getTopicList')->name('tutor.topic.index');
    Route::post('/dashboard/tutor/topic/{topicId}',  'TutorController@createTopic')->name('tutor.topic.create');
    Route::put('/dashboard/tutor/topic/{topicId}/edit', 'TutorController@updateTopic')->name('tutor.topic.update');
    Route::delete('/dashboard/tutor/topic/{topicId}/delete', 'TutorController@deleteTopic')->name('tutor.topic.delete');

    // Tutor - Professional Topic Content
    Route::get('/dashboard/tutor/{id}/topic/{topicId}', 'TutorController@getContentList')->name('tutor.content.index');
    Route::get('/dashboard/{id}/tutor/{topicId}/content/{contentId}', 'TutorController@getContentDetail')->name('tutor.content.detail');
    Route::get('/dashboard/{id}/tutor/topic/{topicId}/content/create', 'TutorController@createContentForm')->name('tutor.content.create');
    Route::post('/dashboard/tutor/topic/{topicId}/content/create', 'TutorController@storeContent')->name('tutor.content.store');
    Route::get('/dashboard/tutor/content/{contentId}/edit', 'TutorController@editContentForm')->name('tutor.content.edit');
    Route::patch('/dashboard/tutor/content/{contentId}/edit', 'TutorController@updateContent')->name('tutor.content.update');
    Route::delete('/dashboard/tutor/content/{contentId}', 'TutorController@deleteContent')->name('tutor.content.delete');

    //Tutor - AcademicTopic
    Route::get('/dashboard/tutor/accourse/{id}/overview', 'AcademicController@getAcTopicList')->name('tutor.actopic.index');
    Route::post('/dashboard/tutor/actopic/{topicId}',  'AcademicController@createAcTopic')->name('tutor.actopic.create');
    Route::put('/dashboard/tutor/actopic/{topicId}/edit', 'AcademicController@updateAcTopic')->name('tutor.actopic.update');
    Route::delete('/dashboard/tutor/actopic/{topicId}/delete', 'AcademicController@deleteAcTopic')->name('tutor.actopic.delete');
    
    //Tutor - Academic Topic Content
    Route::get('/dashboard/tutor/{id}/actopic/{ActopicId}', 'AcademicController@getAcContentList')->name('tutor.accontent.index');
    Route::get('/dashboard/{id}/tutor/{topicId}/accontent/{AccontentId}', 'AcademicController@getAcContentDetail')->name('tutor.accontent.detail');
    Route::get('/dashboard/{id}/tutor/topic/{ActopicId}/accontent/create', 'AcademicController@createAcContentForm')->name('tutor.accontent.create');
    Route::post('/dashboard/tutor/topic/{ActopicId}/accontent/create', 'AcademicController@storeAcContent')->name('tutor.accontent.store');

    // Tutor - Topic Quiz
    Route::get('/dashboard/tutor/topic/{topicId}/quiz', 'TutorController@getQuizDetail')->name('tutor.quiz.index');
    Route::get('/dashboard/tutor/topic/{topicId}/quiz/preview', 'TutorController@getPreviewQuizForm')->name('tutor.quiz.preview');
    Route::get('/dashboard/tutor/topic/{topicId}/quiz/create', 'TutorController@getQuizForm')->name('tutor.quiz.create');
    Route::post('/dashboard/tutor/{topicId}/quiz/create', 'TutorController@storeQuiz')->name('tutor.quiz.store');
    Route::get('/dashboard/tutor/{topicId}/quiz/edit', 'TutorController@getEditQuizForm')->name('tutor.quiz.dit');
    Route::put('/dashboard/tutor/{topicId}/quiz/edit', 'TutorController@update')->name('tutor.quiz.update');
    Route::get('/dashboard/tutor/topic/{topicId}/quiz/result', 'TutorController@getQuizAnswerList')->name('tutor.quiz.answer.list');
    Route::get('/dashboard/tutor/topic/{topicId}/quiz/result/{resultId}', 'TutorController@getQuizAnswerDetail')->name('tutor.quiz.answer.index');
    Route::put('/dashboard/tutor/quiz/result/{resultId}/score', 'TutorController@updateScore')->name('tutor.quiz.score');
    //Tutor - Task
    Route::get('/dashboard/tutor/{id}/task', 'TutorController@getTaskDetail')->name('tutor.task.index');
    Route::get('/dashboard/tutor/{id}/task/preview', 'TutorController@getPreviewTaskForm')->name('tutor.task.preview');
    Route::get('/dashboard/tutor/{id}/task/create', 'TutorController@getTaskForm')->name('tutor.task.create');
    Route::post('/dashboard/tutor/{id}/task/create', 'TutorController@storeTask')->name('tutor.task.store');
    Route::get('/dashboard/tutor/{id}/task/edit', 'TutorController@getEditTaskForm')->name('tutor.task.dit');
    Route::put('/dashboard/tutor/{id}/task/edit', 'TutorController@update')->name('tutor.task.update');
    Route::get('/dashboard/tutor/{id}/task/result', 'TutorController@getTaskAnswerList')->name('tutor.task.answer.list');
    Route::get('/dashboard/tutor/{id}/task/result/{resultId}', 'TutorController@gettaskAnswerDetail')->name('tutor.task.answer.index');
    Route::put('/dashboard/tutor/task/result/{resultId}/score', 'TutorController@updateScore')->name('tutor.task.score');
    // Tutor - Score
    Route::get('/dashboard/tutor/course/{courseId}/score', 'TutorController@getScoreList')->name('tutor.score.list');
    Route::get('/dashboard/tutor/course/{courseId}/score/{scoreId}', 'TutorController@getScoreDetail')->name('tutor.score.detail');

    
    // Student - Pro - MyCourse
    Route::get('/dashboard/course/me', 'StudentController@getMyCourse');
    // Student - Pro - ClassOverview & TopicList
    Route::get('/dashboard/student/course/{id}/overview', 'StudentController@getOverview')->name('student.overview');
    // Student - Pro - TopicDetail & ContentList
    Route::get('/dashboard/student/topic/{topicId}', 'StudentController@getTopic')->name('student.topic.index');
    // Student - Pro - ContentDetail
    Route::get('classroom/{id}/topic/{topicId}/content/{contentId}', 'StudentController@getContentDetail')->name('student.content.index');
    // Student - Pro - Enroll & Unenroll
    Route::get('/enroll/{id}', 'StudentController@enroll')->name('enroll');
    Route::get('/unenroll/{id}', 'StudentController@unenroll')->name('unenroll');
    // Student - Pro - Transaction
    Route::get('/dashboard/transaction', 'StudentController@getTransaction');

    // Student - Acadedmic - MyCourse
    Route::get('/dashboard/course/me', 'StudentController@getMyCourse');
    // Student - Acadedmic - ClassOverview & TopicList
    Route::get('/dashboard/student/ac/course/{id}/overview', 'StudentController@getOverviewAcademic')->name('student.ac.overview');
    // Student - Acadedmic - TopicDetail & ContentList
    Route::get('/dashboard/student/ac/topic/{topicId}', 'StudentController@getTopicAcademic')->name('student.ac.topic.index');
    // Student - Acadedmic - ContentDetail
    Route::get('classroom/ac/{id}/topic/{topicId}/content/{contentId}', 'StudentController@getContentDetailAcademic')->name('student.ac.content.index');
    // Student - Acadedmic - Enroll & Unenroll
    Route::get('/enroll/ac/{id}', 'StudentController@enrollAcademic')->name('ac.enroll');
    Route::get('/unenroll/ac/{id}', 'StudentController@unenrollAcademic')->name('ac.unenroll');
    // Student - Acadedmic - Transaction
    Route::get('/dashboard/transaction', 'StudentController@getTransaction');


    // Tutor & Student (Discussion)
    Route::get('/classroom/{id}/overview', 'ClassController@getOverview');
    //Pro - ForumPage
    Route::get('/classroom/{id}/forum', 'ClassController@getForum')->name('forum');
    Route::get('/classroom/{id}/search', 'ClassController@searchDiscussion')->name('search.discussion');
    //Pro - Discussion
    Route::get('/classroom/discussion/{discId}', 'DiscussionController@index')->name('discussion.index');
    Route::get('/classroom/{id}/discussion', 'DiscussionController@create')->name('discussion.create');
    Route::post('/classroom/{id}/discussion', 'DiscussionController@store')->name('discussion.store');
    Route::get('/classroom/discussion/{discId}/edit', 'DiscussionController@edit')->name('discussion.edit');
    Route::put('/classroom/discussion/{discId}/edit', 'DiscussionController@update')->name('discussion.update');
    Route::delete('/classroom/discussion/{discId}/delete', 'DiscussionController@deleteDiscussion')->name('discussion.delete');
    //Pro - Discussion - Comment/Reply 
    Route::post('/comment/addComment/{disc}', 'DiscussionController@addComment')->name('addComment');
    Route::post('/comment/replyComment/{comment}', 'DiscussionController@replyComment')->name('replyComment');
    
    //Academic - ForumPage
    Route::get('/classroom/ac/{id}/forum', 'AcDiscussionController@getForum')->name('academic.forum');
    Route::get('/classroom/ac/{id}/search', 'AcDiscussionController@searchDiscussion')->name('academic.search.discussion');
    //Academic - Discussion
    Route::get('/classroom/ac/discussion/{discId}', 'AcDiscussionController@index')->name('academic.discussion.index');
    Route::get('/classroom/ac/{id}/discussion', 'AcDiscussionController@create')->name('academic.discussion.create');
    Route::post('/classroom/ac/{id}/discussion', 'AcDiscussionController@store')->name('academic.discussion.store');
    Route::get('/classroom/ac/discussion/{discId}/edit', 'AcDiscussionController@edit')->name('academic.discussion.edit');
    Route::put('/classroom/ac/discussion/{discId}/edit', 'AcDiscussionController@update')->name('academic.discussion.update');
    Route::delete('/classroom/ac/discussion/{discId}/delete', 'AcDiscussionController@deleteDiscussion')->name('academic.discussion.delete');
    //Academic - Dsicussion - Comment/Reply 
    Route::post('/ac/comment/addComment/{disc}', 'AcDiscussionController@addComment')->name('academic.addComment');
    Route::post('/ac/comment/replyComment/{comment}', 'AcDiscussionController@replyComment')->name('academic.replyComment');


    // Content
    Route::get('classroom/topic/{topicId}/content/create', 'ContentsController@create')->name('content.create');
    Route::post('classroom/topic/{topicId}/content', 'ContentsController@store')->name('content.store');
    Route::get('classroom/topic/content/{content}', 'ContentsController@show')->name('content.show');
    Route::get('classroom/topic/content/{content}/edit', 'ContentsController@edit')->name('content.edit');
    Route::patch('classroom/topic/content/{content}', 'ContentsController@update')->name('content.update');
    Route::delete('classroom/topic/contents/{contents}', 'ContentsController@delete')->name('content.delete');
    Route::get('/classroom/{taskId}/task', 'ClassController@getTask');
});
