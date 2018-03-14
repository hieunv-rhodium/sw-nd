<?php
use App\Events\MessagePosted;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin route

Route::get('/admin', 'AdminController@index')->name('admin');

// Authentication routes

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\AuthController@login');
Route::post('logout', 'Auth\AuthController@logout')->name('logout');





// Username route
Route::get('/username', 'UsernameController@show')->middleware('auth');
Route::get('/avatar', 'UsernameController@showAvatar')->middleware('auth');

// home page route

Route::get('/', 'AdminController@index')->name('admin');


// Password routes


// Password Reset Routes...

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Privacy route

Route::get('privacy', 'PagesController@privacy');

// Registration routes

Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\AuthController@register');

// Socialite routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Terms route

Route::get('terms-of-service', 'PagesController@terms');


// test route

Route::get('test', 'TestController@index')->middleware(['auth', 'throttle:15']);


//Profile route

Route::get('show-profile','ProfileController@showProfileToUser')->name('show-profile');

Route::get('determine-profile-route','ProfileController@determineProfileRoute')->name('determine-profile-route');

Route::resource('profile', 'ProfileController');


// User route
Route::resource('user','UserController');

Route::post('user/{id}/delete-file','UserController@deleteImage');

// Setting route

Route::get('settings' , 'SettingsController@edit');
Route::post('settings', 'SettingsController@update')->name('user-update');
Route::post('settings/{id}/delete-file','SettingsController@deleteImage');



// Api User

Route::get('api/user-data' , 'ApiController@userData');
