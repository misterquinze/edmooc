<?php

Auth::routes();

Route::get('/', 'VisitorController@getHomepage');
Route::get('/course', 'VisitorController@getCourses');
Route::get('/about', 'VisitorController@getAbout');
Route::get('/contact', 'VisitorController@getContact');


Route::get('/dashboard', 'DashboardController@getDashboard');
Route::get('/dashboard/favorite', 'DashboardController@getFavorite');
Route::get('/dashboard/course/me', 'DashboardController@getMyCourse');
Route::get('/dashboard/transaction', 'DashboardController@getTransaction');
Route::get('/dashboard/settings', 'DashboardController@getSettings');


Route::get('/classroom/{id}', 'ClassController@getOverview');
Route::get('/classroom/{id}/topic/{topicId}', 'ClassController@getTopic');
Route::get('/classroom/{id}/discussion', 'ClassController@getDiscussion');
Route::get('/classroom/{id}/task', 'ClassController@getTask');


Route::get('/tutor/course', 'TutorController@getCourse');
