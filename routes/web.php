<?php

use Illuminate\Support\Facades\Input;

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('office/dashboard', 'OfficeController@index')->name('dashboard');
Route::get('office', 'Office\LoginController@showLoginForm')->name('office.login');
Route::post('office', 'Office\LoginController@login')->name('office.login.submit');
Route::post('office/logout', 'Office\LoginController@logout')->name('office.logout');
Route::post('office/password/email', 'Office\ForgotPasswordController@sendResetLinkEmail')->name('office.password.email');
Route::get('office/password/reset', 'Office\ForgotPasswordController@showLinkRequestForm')->name('office.password.request');
Route::post('office/password/reset ', 'Office\ResetPasswordController@reset');
Route::get('office/password/reset/{token}', 'Office\ResetPasswordController@showResetForm')->name('office.password.reset');
Route::get('office/register', 'Office\RegisterController@showRegistrationForm')->name('office.register');
Route::post('office/register', 'Office\RegisterController@register');

///* add sittings */
//Route::group(['prefix' => 'sittings'], function() {
//    Route::get('/create', 'SittingController@create')->name('sitting.create');
//    Route::post('/store', 'SittingController@store')->name('sitting.store');
//    Route::get('/', 'SittingController@index')->name('sittings');
//    Route::get('/edit/{id}', 'SittingController@edit')->name('show_edit_sitting')->where('id', '[0-9]+');
//    Route::put('/update/{id}', 'SittingController@update')->name('update_sitting')->where('id', '[0-9]+');
//    Route::get('/delete/{id}', 'SittingController@delete')->name('delete_sitting')->where('id', '[0-9]+');
//});

/* courts */
Route::group(['prefix' => 'courts'], function() {
    Route::get('/', 'CourtController@index')->name('courts');
    Route::get('/get/{id}', 'CourtController@getCourts')->name('getCourtsByParent')->where('id', '[0-9]+');
    Route::get('/create', 'CourtController@create')->name('court.create');
    Route::post('/store', 'CourtController@store')->name('court.store');
    Route::get('/delete/{id}', 'CourtController@delete')->name('court.delete')->where('id', '[0-9]+');
});

/* files */

Route::group(['prefix' => 'files'], function() {
    Route::get('/', 'FileController@index')->name('files');
    Route::post('/store', 'FileController@store')->name('file.store');
    Route::get('/delete/{id}', 'FileController@delete')->name('file.delete')->where('id', '[0-9]+');
    Route::get('/liste', 'FileController@liste')->name('files_list_json');
    Route::get('/getFileInfo/{id}', 'FileController@getFileInfo')->name('getFileInfo');
    Route::get('/edit/{id}', 'FileController@edit')->name('file.edit')->where('id','[0-9]+');
    Route::put('/update/{id}', 'FileController@update')->name('file.update')->where('id','[0-9]+');


    Route::get('/sub_courts', function() {
        $court_id = Input::get('parent_id');
        $sub_courts = \App\Court::where('parent_id', '=', $court_id)->get();
        return response()->json($sub_courts);
    });
});

/* Procedures */
Route::group(['prefix' => 'procedures'],function(){
    Route::post('/store','ProcedureController@store')->name('procedure.store');
    Route::get('/all/{file_id}','ProcedureController@all')->name('getprocedures')->where('file_id','[0-9]+');
    Route::get('/get/{id}','ProcedureController@getProcedure')->name('getprocedure')->where('id','[0-9]+');
    Route::put('/update','ProcedureController@update')->name('procedure.update');
});

/* Parties */
Route::group(['prefix' => 'parties'],function(){
    Route::post('/store','PartieController@store')->name('partie.store');
    Route::get('/all/{file_id}','PartieController@all')->name('partie.all')->where('file_id','[0-9]+');
    Route::put('/update','PartieController@update')->name('partie.update');
    Route::get('/info/{id}','PartieController@getPartieInfo')->name('partie.info')->where('id','[0-9]+');
});

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'UserController@index')->name('users');
//    Route::get('/create','CourtController@create')->name('court.create');
//    Route::post('/store','CourtController@store')->name('court.store');
});

Route::get('/sub_courts', function() {
    $court_id = Input::get('parent_id');
    $sub_courts = \App\Court::where('court_parent', '=', $court_id)->get();
    return response()->json($sub_courts);
});
//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('sittings-list', 'SittingController@manageVue')->name('sittings');
Route::group(['prefix' => 'sittings'], function () {
    Route::get('/', 'SittingController@index')->name('sittings.index');
    Route::post('/store', 'SittingController@store')->name('sittings.store');
    Route::put('/update/{id}', 'SittingController@update')->name('sittings.update');
    Route::delete('/delete/{id}', 'SittingController@destroy')->name('sittings.delete')->where('id', '[0-9]+');
});
//Route::group(['middleware'=>['web']], function(){
//
//    Route::resource('sittings','SittingController');
//});
//Route::put('/edit','SittingController@update')->name('sittings.update');