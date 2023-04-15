<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
//User Password Change and Profile picture
Route::post('/userpasswordChange', 'UserpassController@userpasswordChange');
Route::post('/useruploadImage', 'HomeController@useruploadImage');

//user Dashboard
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userlogout', 'HomeController@logout');
Route::get('/profile', 'HomeController@profile');

//User Complain
Route::get('/complainForm', 'HomeController@complainForm');
Route::post('/complainStore', 'ComplainController@complainStore');
Route::get('/complainView', 'ComplainController@complainView');

//User Suggestions
Route::get('/suggestionForm', 'SuggestionController@suggestionForm');
Route::post('/suggestionStore', 'SuggestionController@suggestionStore');
Route::get('/suggestionView', 'SuggestionController@suggestionView');
Route::get('/deleteSuggestion{id}', 'SuggestionController@deleteSuggestion');
Route::get('/editSuggestion{id}', 'SuggestionController@editSuggestion');
Route::Post('/suggestionUpdate{id}', 'SuggestionController@suggestionUpdate');

//User notice
Route::get('notice', 'HomeController@noticePDF');


//Admin
Route::namespace("Admin")->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::namespace('Auth')->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');

    });
});
//Admin Pass change
Route::get('/pas', 'Admin\Auth\PasswordController@password');
Route::post('/passwordChange', 'Admin\Auth\PasswordController@store');

//Admin pro pic change
Route::get('/profilepic', 'Admin\HomeController@profilepic');
Route::post('/uploadImage', 'Admin\HomeController@uploadImage');

// Admin User Complain
Route::get('/userComplain', 'Admin\HomeController@userComplain');
Route::get('/deleteComplain/{id}', 'Admin\ComplainController@deleteComplain');
Route::get('/approveComplain/{id}', 'Admin\ComplainController@approveComplain');
Route::get('/editComplain{id}', 'Admin\ComplainController@editComplain');
Route::post('/updateComplain{id}', 'Admin\ComplainController@updateComplain');

//Admin User Suggestion
Route::get('/userSuggestion', 'Admin\SuggestionController@userSuggestion');
Route::get('/approveSuggestion/{id}', 'Admin\SuggestionController@approveSuggestion');
Route::get('/admineditSuggestion{id}', 'Admin\SuggestionController@admineditSuggestion');
Route::post('/adminUpdateSuggestion{id}', 'Admin\SuggestionController@adminUpdateSuggestion');
Route::get('/adminDeleteSuggestion/{id}', 'Admin\SuggestionController@adminDeleteSuggestion');

Route::get('/noticeStore', 'Admin\PdfController@notice');

//Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('/file-upload', 'Admin\PdfController@fileUploadPost')->name('file.upload.post');
Route::get('/pdfview', 'Admin\PdfController@Pdfview');


//User List in admin
Route::get('/userList', 'Admin\HomeController@userList');
Route::get('/deleteUser/{id}', 'Admin\HomeController@deleteUser');


//Authorities Login

Route::namespace("Authority")->prefix('authority')->group(function () {
    Route::get('/', 'HomeController@index')->name('authority.home');
    Route::namespace('Auth')->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('authority.login');
        Route::post('/login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('authority.logout');
    });
});
//Auth pro pic change
Route::get('/Authprofilepic', 'Authority\HomeController@Authprofilepic');
Route::post('/upAuth', 'Authority\HomeController@upAuth');

//Auth Pass change
Route::get('/AuthPass', 'Authority\Auth\PassController@AuthPass');
Route::post('/PassAuth', 'Authority\Auth\PassController@PassAuth');

Route::get('/authlogout', 'Authority\HomeController@authlogout');

Route::get('/authComplain', 'Authority\HomeController@userComplain');
Route::get('/authDelete/{id}', 'Authority\HomeController@deleteComplain');
Route::get('/authApp/{id}', 'Authority\HomeController@approveComplain');

Route::get('/authSuggestion', 'Authority\HomeController@userSuggestion');
Route::get('/authDelSug/{id}', 'Authority\HomeController@authDeleteSuggestion');
Route::get('/authSugApp/{id}', 'Authority\HomeController@approveSuggestion');
