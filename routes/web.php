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


Route::get('/Dashboard', function() {
    return view('admin.index');
});

/**
 * User Side Routes
 */
Route::get('/Listing', 'ListingController@index')->name('listing');

Route::get('/Admin/Blogs', function() {
    return view('admin.blogs');
});

Route::get('/search', function() {
    return view('search');
});

Route::get('/single', function() {
    return view('single');
});

Route::get('/Inspirations', function() {
    return view('allCategory');
});


