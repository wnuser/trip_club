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
Route::group(['Middleware' => ['auth']], function () {

    Route::resource('AdminBlogs', AdminBlogController::class);
    Route::resource('BlogCategorys', BlogCategoryController::class);
    Route::resource('FrontSliders', FrontSliderController::class);
    Route::resource('Ads', AdsController::class);


    Route::get('/slider/delete/{id}', 'FrontSliderController@destroy')->name('slider.delete');
    Route::get('/blogs/delete/{id}', 'AdminBlogController@destroy')->name('blog.delete');
    Route::post('/change/frontCategory', 'AdminBlogController@changeFrontcategory')->name('change.frontCategory');
    
});




Route::get('/', 'HomeController@index');


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

// Route::get('/Inspirations', function() {
//     return view('allCategory');
// });

Route::get('/blogs/categories/', 'BlogCategoryController@allCategories')->name('all.categories');
Route::get('/category/blogs/{id}', 'BlogCategoryController@categoryBlogs')->name('category.blogs');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
