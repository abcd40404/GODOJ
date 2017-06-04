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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/probCategory', function () {
    return view('probCategory');
});

Route::POST('/pageAjax', 'pageController@getPage');

Route::get('/problem/{pid}', 'pageController@showProblem');

Route::get('/problem/{pid}/submit', 'pageController@submit');

Route::POST('/problem/{pid}/problemJudge', 'problemController@judge');
