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
Route::get('/404',function (){
   return "Vi sorry 404 Invalid get request";
});
Route::get('/405',function (){
    return "Vi sorry 405 Invalid post request";
});

Route::get('/', [
    'uses' => 'ProjectController@index',
    'as'   => '/'
]);
Route::get('/category-blog/{id}', [
    'uses' => 'ProjectController@categoryBlog',
    'as'   => 'category-blog'
]);
Route::get('/blog-details/{id}', [
    'uses' => 'ProjectController@blogDetails',
    'as'   => 'blog-details'
]);
Route::get('/sign-up', [
    'uses' => 'SignUpController@index',
    'as'   => 'sign-up'
]);
Route::post('/new-sign-up', [
    'uses' => 'SignUpController@newSignUp',
    'as'   => 'new-sign-up'
]);
Route::post('/visitor-logout', [
    'uses' => 'SignUpController@visitorLogout',
    'as'   => 'visitor-logout'
]);
Route::get('/visitor-login', [
    'uses' => 'SignUpController@visitorLogin',
    'as'   => 'visitor-login'
]);
Route::post('/visitor-sign-in', [
    'uses' => 'SignUpController@visitorSignIn',
    'as'   => 'visitor-sign-in'
]);
Route::get('/email-check/{email}', [
    'uses' => 'SignUpController@emailCheck',
    'as'   => 'email-check'
]);
Route::post('/new-comment', [
    'uses' => 'CommentController@newComment',
    'as'   => 'new-comment'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/add-category',
    [
        'uses'=>'CategoryController@addCategory',
        'as'=>'add-category'
    ]);
Route::post('/category/new-category',
    [
        'uses'=>'CategoryController@newCategory',
        'as'=>'new-category'
    ]);
Route::get('/category/manage-category',
    [
        'uses'=>'CategoryController@manageCategory',
        'as'=>'manage-category'
    ]);
Route::get('/category/edit-category/{id}',
    [
        'uses'=>'CategoryController@editCategory',
        'as'=>'edit-category'
    ]);
Route::post('/category/update-category',
    [
        'uses'=>'CategoryController@updateCategory',
        'as'=>'update-category'
    ]);
Route::post('/category/delete-category',[
    'uses'=>'CategoryController@deleteCategory',
    'as'=>'delete-category'
]);
Route::get('/blog/add-blog',[
    'uses'=>'BlogController@addBlog',
    'as'=>'add-blog'
]);

Route::post('/blog/new-blog',[
    'uses'=>'BlogController@newBlog',
    'as'=>'new-blog'
]);
Route::get('/blog/manage-blog',[
    'uses'=>'BlogController@manageBlog',
    'as'=>'manage-blog'
]);
Route::get('/blog/edit-blog/{id}',[
    'uses'=>'BlogController@editBlog',
    'as'=>'edit-blog'
]);
Route::post('/blog/update-blog/',[
    'uses'=>'BlogController@updateBlog',
    'as'=>'update-blog'
]);
Route::post('/blog/delete-blog/',[
    'uses'=>'BlogController@deleteBlog',
    'as'=>'delete-blog'
]);
Route::get('/manage-comments/',[
    'uses'=>'CommentController@manageComment',
    'as'=>'manage-comments'
]);
Route::post('/manage-comments/delete-comment',[
    'uses'=>'CommentController@deleteComment',
    'as'=>'delete-comment'
]);
Route::post('/manage-comments/comment-unpublished',[
        'uses'=>'CommentController@commentUnpublished',
        'as'=>'comment-unpublished'
]);
Route::post('/manage-comments/comment-published',[
    'uses'=>'CommentController@commentPublished',
    'as'=>'comment-published'
]);


























































