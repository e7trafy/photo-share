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

Auth::routes();
Route::namespace('Admin')->prefix('admin')->group(function () {

Route::get('/home', 'Home@index')->name('home');


});

Route::get('/home', 'HomeController@index')->name('home');

//
//Route::middleware('auth')->group(function () {
//    Route::resource('albums','AlbumController');
//
//});

Route::group(['middleware'=>'auth','prefix'=>'albums'],function (){
   Route::get('get_all','AlbumController@getAllAlbums');
   Route::post('create_album','AlbumController@createAlbum');
});
