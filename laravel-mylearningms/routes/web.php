<?php

Route::get('/', 'HomeController@index');
Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');

    Route::resource('courses', 'CoursesController');

    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');

    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');

    Route::resource('lessons', 'LessonsController');

    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');

    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');

    Route::resource('questions', 'QuestionsController');

    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');

    Route::delete('questions-options/destroy', 'QuestionsOptionsController@massDestroy')->name('questions-options.massDestroy');

    Route::resource('questions-options', 'QuestionsOptionsController');

    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');

    Route::resource('tests', 'TestsController');
});
