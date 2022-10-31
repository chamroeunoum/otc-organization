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

Route::group([

    'prefix' => '',
    'middleware' => 'auth'

], function(){
    
});


Route::group([
], function(){

    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', function () {
        return view('pages.login');
    });
    Route::get('/register', function () {
        return view('pages.register');
    });
    Route::get('/register_confirmation', function () {
        return view('pages.register_confirmation');
    });
    Route::get('/forgot_password', function () {
        return view('pages.forgot_password');
    });
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });
    Route::get('/account', function () {
        return view('pages.account');
    });
    Route::get('/folder', function () {
        return view('pages.folder');
    });
    Route::get('/profile', function () {
        return view('pages.profile');
    });
    Route::get('/search', function () {
        return view('pages.search');
    });
    Route::get('/document', function () {
        return view('pages.documents.index');
    });
    Route::get('/report', function () {
        return view('pages.report');
    });
    Route::get('/document/byministry', function () {
        return view('pages.documents.byministry');
    });
    Route::get('/about', function () {
        return view('pages.about');
    });

});
