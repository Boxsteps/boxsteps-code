<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Resources routes
|--------------------------------------------------------------------------
*/

Route::resource('courses', 'CourseController');
Route::resource('features', 'FeatureController');
Route::resource('messages', 'MessageController');
Route::resource('plans', 'PlanController');
Route::resource('revisions', 'RevisionController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController', ['except' => ['create', 'store']]);

/*
|--------------------------------------------------------------------------
| Users/Auth routes
|--------------------------------------------------------------------------
*/

// Middleware web group
Route::group(['middleware' => 'web'], function () {});

// Authentication routes
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Authentication Google+
Route::get('login/google', 'Auth\AuthController@redirectToProvider');
Route::get('login/google/callback', 'Auth\AuthController@handleProviderCallback');

// Password reset routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// User routes
Route::get('users/create', 'Auth\AuthController@showRegistrationForm');
Route::post('users/store', 'Auth\AuthController@register');

// Profile routes
Route::get('profile', 'UserController@profile');

// Dashboard routes
Route::get('dashboard', 'DashboardController@index');
Route::get('new', 'DashboardController@newview');
Route::get('/', 'DashboardController@start');

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::get('/api/conceptual-sections-dropdown', 'ConceptualSectionController@index');
