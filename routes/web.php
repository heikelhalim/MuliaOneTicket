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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//	if(Auth::guest()){
//    	return view('welcome');
//	}else{
//		return redirect('/home');
//	}
//});



Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function(){
	return redirect(action('\Kordy\Ticketit\Controllers\TicketsController@index'));
});
