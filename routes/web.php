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
Route::resource('articles', 'ArticlesController');
Route::get('about', 'StaticsController@about')->name('about');
Route::get('index', 'StaticsController@index');
Route::resource('comments', 'CommentsController');
Route::resource('books', 'BooksController');
Route::resource('authors', 'AuthorsController');
Route::resource('commentbook', 'CommentsBooksController');

Route::resource('images', 'ImageController');

// Route::resource('admin', 'AdminController');
// Route::resource('home', 'HomeController');

// Route ::group(['middleware' => ['auth','role:manager']],
//     function () {
//     Route ::resource('manager','admin\ManagerController');
// });

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware'=>['auth']],
function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware'=>['auth','role:manager'],'namespace'=>'admin',
'prefix'=>'admin','as'=>'admin.'],
function(){
    Route::resource('/user-manage', 'AdminController');
    Route::resource('/dashboard', 'HomeController');
});

Route::group(['middleware'=>['auth','role:user'],'namespace'=>'user',
'prefix'=>'user','as'=>'user.'],
function(){
    Route::resource('/dashboard', 'HomeController');
});