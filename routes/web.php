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

/**
 * Admin blog routes
 */
// Route::get('/Admin/Blogs', 'AdminBlogController@index')->name('admin.blogs');
Route::resource('AdminBlogs', AdminBlogController::class);
Route::resource('BlogCategorys', BlogCategoryController::class);
Route::resource('FrontSliders', FrontSliderController::class);
Route::resource('Ads', AdsController::class);


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


Route::get('/search', function() {
    return view('search');
});

Route::get('/single', function() {
    return view('single');
});

Route::get('/Inspirations', function() {
    return view('allCategory');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
