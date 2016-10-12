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

// Relation routes testing

use App\User as User;
use App\Role as Role;
use App\Feature as Feature;

Route::get('/usuario/{id}', function ($id) {

    $user = User::find($id);
    echo 'Nombre: ' . $user->name . '<br />';
    echo 'Apellido: ' . $user->second_name . '<br />';
    echo 'Email: ' . $user->email . '<br />';

    echo 'Rol: ' . $user->role->role . '<br />';

});

Route::get('/funcionalidad/{id}', function ($id) {

    $feature = App\Feature::find($id);

    foreach ($feature->roles as $role) {
        echo $role->role . '<br />';
    }

});

Route::get('/rol/{id}', function ($id) {

    $role = Role::find($id);

    echo 'Nombre: ' . $role->role . '<br /><br />';

    foreach ($role->features as $feature) {
        echo $feature->feature . '<br />';
    }

});

// Basic routes for Xenon theme

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/planificacion', function () {
    return view('planificacion');
});

Route::group(['middleware' => 'web'], function () {

    // Authentication routes
    Route::get('/login', 'Auth\AuthController@showLoginForm');
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/logout', 'Auth\AuthController@logout');

    // Registration routes
    Route::get('/register', 'Auth\AuthController@showRegistrationForm');
    Route::post('/register', 'Auth\AuthController@register');

    // Password reset routes
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');

    // Dashboard route
    Route::get('/home', 'HomeController@index');

});
