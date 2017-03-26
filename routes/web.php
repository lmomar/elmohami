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
Route::get('office','Office\LoginController@showLoginForm')->name('office.login');
Route::post('office','Office\LoginController@login')->name('office.login.submit');
Route::post('office/logout','Office\LoginController@logout')->name('office.logout');
Route::post('office/password/email','Office\ForgotPasswordController@sendResetLinkEmail')->name('office.password.email');
Route::get('office/password/reset', 'Office\ForgotPasswordController@showLinkRequestForm')->name('office.password.request');
Route::post('office/password/reset ','Office\ResetPasswordController@reset');
Route::get('office/password/reset/{token}', 'Office\ResetPasswordController@showResetForm')->name('office.password.reset');
Route::get('office/register','Office\RegisterController@showRegistrationForm')->name('office.register');
Route::post('office/register','Office\RegisterController@register');


Route::group(['prefix'=>'courts'], function(){
    Route::get('/', 'CourtController@index')->name('courts');
    Route::get('/create','CourtController@create')->name('court.create');
    Route::post('/store','CourtController@store')->name('court.store');
});

Route::group(['prefix'=>'files'], function(){
    Route::get('/', 'FileController@index')->name('files');
//    Route::get('/create','CourtController@create')->name('court.create');
//    Route::post('/store','CourtController@store')->name('court.store');
});

Route::group(['prefix'=>'users'], function(){
    Route::get('/', 'UserController@index')->name('users');
//    Route::get('/create','CourtController@create')->name('court.create');
//    Route::post('/store','CourtController@store')->name('court.store');
});

Route::get('/sub_courts', function(){
    $court_id=Input::get('parent_id');
    $sub_courts=\App\Court::where('court_parent', '=', $court_id)->get();
    return response()->json($sub_courts);
});
//Auth::routes();

Route::get('/home', 'HomeController@index');
