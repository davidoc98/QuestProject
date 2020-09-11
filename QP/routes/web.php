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
 // -> Открыть профиль другого
Route::get('/', function () {
    return redirect('/login');
})->middleware('guest');

// people
Route::get('/', 'HomeController@index')->name('Home');
Route::get('/people', 'PeopleController@index')->name('people');
// posts
Route::post('/store', 'PostController@store')->name('post.save');
Route::get('/destroy/{id}', 'PostController@destroy')->name('post.destroy');

//profile
Route::get('/profilesettings', 'ProfileController@settings')->name('profile.settings');
Route::PUT('/profileupdate', 'ProfileController@update')->name('profile.update');

//images
Route::POST('/updateavatar', 'ProfileController@UpdateAvatar')->name('avatar.update');
Route::get('gallery', 'GalleryController@index')->name('gallery');
Route::PUT('/addgallery', 'GalleryController@addGallery')->name('gallery.add');

//Friendship
Route::get('{alias}/destroy', 'FriendshipController@destroy')->name('destroy');
Route::get('{alias}/friends', 'FriendshipController@show')->name('friends');
Route::get('addfriend/{alias}', 'FriendshipController@add')->name('friends.add');



// Route::get('id{id}', 'ProfileController@index')->name('Profile');
Route::get('id{id}', 'ProfileController@show')->name('profile')->where(['id' => '[0-9]+']);
Route::get('{alias}', 'ProfileController@show')->name('profile')->where(['alias' => '^[a-zA-Z0-9_-]+$']);




//Route::get('id{id}', 'PostController@show')->name('Posts')->where(['id' => '[0-9]+']);
//Route::get('{alias}', 'PostController@show')->name('Posts')->where(['alias' => '^[a-zA-Z0-9_-]+$']);

//Route::get('{linkname}', 'ProfileController@index')->name('Profile'); // -> Мой профиль
// Route::get('{indicator}', 'ProfileController@show')->name('profile')->where(['indicator' => '[\W\D_-]+']);
