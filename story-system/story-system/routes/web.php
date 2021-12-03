<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\HomeController@Index');
Route::get('/book', 'App\Http\Controllers\BookController@Index');
Route::post('search-book', 'App\Http\Controllers\BookController@SearchBook');
Route::get('user-manage', 'App\Http\Controllers\UserController@UserManage');
Route::get('user-add', 'App\Http\Controllers\UserController@UserAdd');
Route::get('user-edit/{id}', 'App\Http\Controllers\UserController@UserEdit');
Route::post('user-edit', 'App\Http\Controllers\UserController@UserEditPost');
Route::post('user-add', 'App\Http\Controllers\UserController@UserAddPost');
Route::post('user-delete', 'App\Http\Controllers\UserController@UserDeletePost');
Route::post('user-search', 'App\Http\Controllers\UserController@UserSearch');

Route::get('book-add', 'App\Http\Controllers\BookController@BookAdd');
Route::post('book-add', 'App\Http\Controllers\BookController@BookAddPost');
Route::get('book-detail/{id}', 'App\Http\Controllers\BookController@BookDetail');
Route::get('book-delete/{id}', 'App\Http\Controllers\BookController@BookDelete');
Route::get('book-edit/{id}', 'App\Http\Controllers\BookController@BookEdit');
Route::post('book-edit', 'App\Http\Controllers\BookController@BookEditPost');


Route::get('book-rental/{id}', 'App\Http\Controllers\BookController@BookRental');
Route::post('book-rental', 'App\Http\Controllers\BookController@BookRentalPost');

Route::get('rental-manage/{all}', 'App\Http\Controllers\RentalController@Index');
Route::post('book-return', 'App\Http\Controllers\RentalController@BookReturn');

Route::post('book-renewal', 'App\Http\Controllers\RentalController@BookRenewal');

Route::post('rental-search', 'App\Http\Controllers\RentalController@RentalSearch');

Route::get('admin-login', 'App\Http\Controllers\AdminController@Index');

Route::post('login', 'App\Http\Controllers\AdminController@Login');
Route::get('logout', 'App\Http\Controllers\AdminController@Logout');