<?php

// use App\Mail\ApprovalMail;
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

// Route::get('/email', function () {
//     return new ApprovalMail();
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin_login', 'AdminController@login')->name('admin_login');

Route::post('/admin-login', 'AdminController@adminLogin')->name('adminLogin');

Route::get('/upload-video', 'VideoController@create')->name('createVideo');

Route::post('/upload-video', 'VideoController@uploadVideo')->name('upload_video');

Route::post('/save-video-data', 'VideoController@saveVideoData')->name('saveVideoData');

Route::get('/list-videos', 'VideoController@listVideos')->name('listVideos');

Route::get('/play-video/{id}', 'VideoController@playVideo')->name('playVideo');


Route::get('list-users', 'AdminController@listUsers')->name('listUsers');

Route::get('user/{id}', 'AdminController@showUser')->name('userDetails');


Route::post('change-status', 'AdminController@changeStatus')->name('changeStatus');

Route::post('cancel-Subscription', 'AdminController@cancelSubscription')->name('cancelSubscription');
Route::get('admin-logout', 'AdminController@logout')->name('admin_logout');


// Fronted routes


Route::middleware(['checkSub'])->group(function () {

    
Route::get('/', 'HomeController@home')->name('getIndex');

Route::get('/playvideo/{slug}', 'HomeController@playVideo')->name('play_video');


});
Route::get('/logout/', 'HomeController@logout')->name('user_logout');
Route::get('/subscriptions/', 'HomeController@getSubs')->name('getSubs');

Route::get('/check-out/', 'HomeController@checkOut')->name('checkOut');

Route::get('/Thank-you/', 'HomeController@confirmPayment')->name('confirmPayment');

Route::get('/cancelled/subscription/', 'HomeController@cancelled')->name('cancelled');


Route::get('/payment', 'PaymentController@index')->name('payment');
Route::post('/charge', 'PaymentController@charge')->name('charge');

