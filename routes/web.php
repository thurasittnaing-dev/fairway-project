<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

//Start from here
//Student
Route::get('/student','StudentController@index');
Route::get('/student/add', 'StudentController@add');
Route::post('/student/add', 'StudentController@insert');
Route::get('/student/detail/{id}', 'StudentController@detail');
Route::get('/student/delete/{id}', 'StudentController@delete');
//Course
Route::get('course','CourseController@index');
Route::get('course/detail/{id}','CourseController@detail');
Route::get('course/add','CourseController@add');
Route::post('course/add','CourseController@insert');
Route::get('course/delete/{id}', 'CourseController@delete');
//Comment
Route::post('/comment/add','CommentController@add');
Route::get('/comment/delete/{id}', 'CommentController@delete');
//UpdateCourse
Route::get('/course/edit/{id}','CourseController@editPage');
Route::post('/course/edit/{id}','CourseController@update');
//UpdateStudent
Route::get('student/edit/{id}', 'StudentController@editPage');
Route::post('student/edit/{id}', 'StudentController@update');

	
