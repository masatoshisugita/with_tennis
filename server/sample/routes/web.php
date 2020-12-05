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

 //use Illuminate\Routing\Route;
 use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/event');
});

Auth::routes();
Route::resource('user', 'UserController');
Route::resource('event', 'EventController');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/events/{event}/comments', 'CommentController@store');
Route::delete('/events/{event}/comments/{comment}', 'CommentController@destroy');

