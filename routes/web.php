<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
// Route::get('clear_cache', function () {
//     Artisan::call('cache:clear');
//     Artisan::call('route:clear');
//     return back();
// });

Route::middleware(['middleware'=> 'PreventBackHistory'])->group(function(){
  Auth::routes(['verify' => true]);
});
// home or frontend page route
Route::get('/', "HomeController@home");
Route::get('about', 'HomeController@about')->name('about');
Route::get('quality-assurance', 'HomeController@quality_assurance')->name('quality-assurance');
Route::get('sister-concerns', 'HomeController@sister_concerns')->name('sister-concerns');
Route::get('national-presence', 'HomeController@national_presence')->name('national-presence');
Route::get('global-presence', 'HomeController@global_presence')->name('global-presence');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::post('contact/submit', 'ContactController@contact_submit')->name('contact-submit');
// Auth Route
Route::get('/email/verify', 'Auth\VerificationController@emailVerify')->name('verification.notice');
Route::post('/email/verification-notification', 'Auth\VerificationController@emailVerificationNotification')->name('verification.send');
Route::get('/forgot-password','Auth\ForgotPasswordController@forgotPassword')->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@resetPassword')->middleware('guest')->name('password.reset');
Route::post('/reset-password', 'Auth\ResetPasswordController@resetPasswordUpdate')->middleware('guest')->name('password.update');
Route::get('social-login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('social-login/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('/home', 'HomeController@index')->name('home');
// user route
Route::group(['prefix' =>'user', 'middleware'=> ['verified','isUser', 'auth', 'PreventBackHistory'] ], function(){
    Route::get('dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('profile', 'UserController@profile')->name('user.profile');
    Route::get('settings', 'UserController@settings')->name('user.settings');
});



