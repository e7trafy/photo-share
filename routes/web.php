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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('get_public_all', 'AlbumsController@getPublicAlbums');


Route::middleware(['auth'])->group(function () {
    Route::resource('albums', 'AlbumsController');
    Route::delete('albums/photo/{photo}', 'AlbumsController@destroyPhoto')->name('photo.destroy');

    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
});


Route::get('profile/{id}', 'HomeController@profile')->name('site.profile');
Route::get('albums/get_all_user/{id?}', 'AlbumsController@getUserAlbums');
Route::get('albums/get_album/{id?}', 'AlbumsController@getAlbum');

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/', 'Home@index')->name('admin.home1');
        Route::get('/home', 'Home@index')->name('admin.home');
        Route::resource('users', 'Users', [
            'as' => 'admin'
        ]);
        Route::resource('albums', 'Albums', [
            'as' => 'admin'
        ]);
        Route::resource('roles', 'Roles', [
            'as' => 'admin'
        ]);
        Route::resource('permissions', 'Permissions', [
            'as' => 'admin'
        ]);
        Route::get('permissions/fetch', 'Permissions@routeFetch')->name('permissions.fetch');
        Route::get('photo/{photo}', 'Albums@destroyPhoto')->name('photo.destroy');
    });
});
