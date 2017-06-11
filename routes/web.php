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

use App\Category;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/probCategory', function () {
        return view('probCategory');
    });
    //回傳about 頁面
    Route::get('/about', 'pageController@getHomePage');
    ////
    Route::get('/about/addProblem', function(){
        $categories = Category::all();
        // echo $categories;
        return view('homepage.addProblem', compact('categories'));
    });
    Route::get('/about/accounts', function(){
        $users = User::all();
        return view('homepage.accounts', compact('users'));
    });

    Route::get('/about/accounts/edit', 'adminController@edit');

    Route::POST('/about/accounts/updateAccount', 'adminController@updateAccount');
    //ajax
    Route::get('/about/accounts/deleteAccount', 'adminController@deleteAccount');
    ////
    Route::POST('/about/insertProblem', 'problemController@insertProblem');

    Route::POST('/pageAjax', 'pageController@getPage');

    Route::get('/problem/{pid}', 'pageController@showProblem');

    Route::get('/problem/{pid}/submit', 'pageController@submit');

    Route::POST('/problem/{pid}/problemJudge', 'problemController@judge');

    Route::get('/problem/{pid}/result', 'problemController@result');


    // Route::get('/home', 'HomeController@index')->name('home');

});
