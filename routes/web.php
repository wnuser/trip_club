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
    Route::get('click/count/{id}', 'AdsController@clicksCounts')->name('click.count');
    Route::get('approve/commnet/{id}', 'CommentController@approveComment')->name('approve.comment');
    Route::get('/Dashboard', function() {
        return view('admin.index');
    })->name('dashboard');
    Route::get('/edit/category/{id}', 'BlogCategoryController@edit')->name('edit.blog');
    Route::post('/update/category', 'BlogCategoryController@update')->name('update.blog');
    Route::get('/delete/category/{id}', 'BlogCategoryController@destroy')->name('delete.blog');


    Route::get('/slider/delete/{id}', 'FrontSliderController@destroy')->name('slider.delete');
    Route::get('/blogs/delete/{id}', 'AdminBlogController@destroy')->name('blog.delete');
    Route::post('/change/frontCategory', 'AdminBlogController@changeFrontcategory')->name('change.frontCategory');
    Route::get('/subscribe/delete/{id}', 'SubscribeController@destroy')->name('subscribe.delete');
    Route::get('/blogquery/delete/{id}', 'BlogQueryController@destroy')->name('blogquery.delete');
    Route::get('/users/blogs/', 'AdminBlogController@getUsersblogs')->name('users.blogs');
    Route::get('/user/blog/updated/{id}', 'AdminBlogController@adminDone')->name('users.blog.updated');
    Route::get('/blog/edit/{id}', 'AdminBlogController@edit')->name('blog.edit');
    Route::post('/blog/update', 'AdminBlogController@update')->name('blog.update');

    Route::get('/slider/edit/{id}', 'FrontSliderController@edit')->name('slider.edit');
    Route::post('/slider/update', 'FrontSliderController@update')->name('slider.update');
    
});

Route::post('/post/comment', 'CommentController@store')->name('post.commnet');
Route::post('/blog/upload', 'BlogController@blogUpload')->name('blog.image.upload');
Route::post('/user/blog/post', 'BlogController@addUseBlog')->name('user.blog.post');

Route::post('search', 'SearchController@index')->name('search');
Route::get('search/filter', 'SearchController@searchView')->name('search.filter');
Route::get('/', 'HomeController@index')->name('Home');
Route::get('/blog/{id}', 'BlogController@show')->name('single.blog');

Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/privacy', 'PrivacyController@index')->name('privacy');

Route::post('/contact/save', 'ContactController@store')->name('save.contact');

/**
 * ajax Routes
 */

 Route::post('/get/state', 'ajaxController@getState')->name('get.state');
 Route::post('/get/city', 'ajaxController@getCity')->name('get.city');


/**
 * mentors route
 */
Route::get('/mentors/{id}', 'MentorController@index')->name('mentors');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('avatarUpdate/', 'ProfileController@uploadImage')->name('uploadImage');
Route::post('/update/profile', 'ProfileController@update')->name('update.profile');
Route::post('/save/question', 'QuestionsController@store')->name('save.question');
Route::get('/new/questions', 'ProfileController@newQuestions')->name('mentor.new.questions');
Route::get('/answered/questions', 'ProfileController@answeredQuestions')->name('mentor.answered.questions');
Route::post('/save/answer', 'AnswerController@store')->name('save.answer');
Route::post('ask', 'QuestionsController@askedQuestion')->name('ask.question');
Route::get('/your/questions', 'ProfileController@askedQuestions')->name('your.questions');
Route::post('/save/post', 'PostController@store')->name('save.post');
Route::post('/add/like', 'ajaxController@addlikes')->name('add.like');

Route::post('/user/details', 'ajaxController@userDetails')->name('user.details');


Route::get('/feed', 'PostController@index')->name('feed');
/**
 * User Side Routes
 */
Route::get('/Listing', 'ListingController@index')->name('listing');
Route::get('/forum/{id?}', 'QuestionsController@index')->name('forum');
Route::get('/question/{slug}', 'QuestionsController@singleQuestion')->name('single.question');


// Route::get('/search', function() {
//     return view('search');
// });

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
