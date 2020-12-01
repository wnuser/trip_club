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
Route::group(['middleware' => ['auth']], function () { 

    Route::resource('AdminBlogs', AdminBlogController::class);
    Route::resource('BlogCategorys', BlogCategoryController::class);
    Route::resource('FrontSliders', FrontSliderController::class);
    Route::resource('Ads', AdsController::class);
    Route::resource('Subscribe', SubscribeController::class);
    Route::resource('BlogQuery', BlogQueryController::class);
    Route::resource('Subscribe', SubscribeController::class);
    Route::resource('Blogquery', BlogQueryController::class);
    Route::resource('AdsHistory', AdsHistoryController::class);
    Route::resource('Comments', CommentController::class);

    
    /**Ads Routes */
    Route::get('stop/Ad/{id}', 'AdsController@stopRunningAd')->name('stop.ad');
    Route::get('ads/history/{id}', 'AdsHistoryController@show')->name('ads.history');
    Route::post('ads/update', 'AdsController@update')->name('ad.update');
    Route::post('search', 'SearchController@index')->name('search');
    Route::get('click/count/{id}', 'AdsController@clicksCounts')->name('click.count');
    Route::get('approve/commnet/{id}', 'CommentController@approveComment')->name('approve.comment');
    Route::get('/Dashboard', function() {
        return view('admin.index');
    });


    Route::get('/slider/delete/{id}', 'FrontSliderController@destroy')->name('slider.delete');
    Route::get('/blogs/delete/{id}', 'AdminBlogController@destroy')->name('blog.delete');
    Route::post('/change/frontCategory', 'AdminBlogController@changeFrontcategory')->name('change.frontCategory');
    Route::get('/subscribe/delete/{id}', 'SubscribeController@destroy')->name('subscribe.delete');
    Route::get('/blogquery/delete/{id}', 'BlogQueryController@destroy')->name('blogquery.delete');
    
});

Route::post('/post/comment', 'CommentController@store')->name('post.commnet');
Route::post('/blog/upload', 'BlogController@blogUpload')->name('blog.image.upload');
Route::post('/user/blog/post', 'BlogController@addUseBlog')->name('user.blog.post');


Route::get('/', 'HomeController@index')->name('Home');
Route::get('/blog/{id}', 'BlogController@show')->name('single.blog');




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
