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


Route::get('/', 'LandingController@index');
Route::get('/home', 'HomeController@index')->middleware(['web','auth']);
Route::get('/admin-panel', 'AdminController@index')->middleware(['web','auth']);

Route::get('/users', 'UsersController@index')->middleware(['web','auth']);
Route::get('/users/create', 'UsersController@create')->middleware(['web','auth']);
Route::post('/users/store', 'UsersController@store')->middleware(['web','auth']);
Route::get('/users/edit/{id}', 'UsersController@edit')->middleware(['web','auth']);
Route::get('/users/{id}', 'UsersController@show')->middleware(['web','auth']);
Route::put('/users/{id}', 'UsersController@update')->middleware(['web','auth']);
Route::delete('/users/{id}', 'UsersController@destroy')->middleware(['web','auth']);

Route::get('/roles', 'RolesController@index')->middleware(['web','auth']);
Route::get('/roles/{id}', 'RolesController@show')->middleware(['web','auth']);

Route::get('/products','ProductsController@index')->middleware(['web','auth']);
Route::get('/products/create','ProductsController@create')->middleware(['web','auth']);
Route::post('/products/store','ProductsController@store')->middleware(['web','auth']);
Route::get('/products/edit/{id}','ProductsController@edit')->middleware(['web','auth']);
Route::put('/products/{id}','ProductsController@update')->middleware(['web','auth']);
Route::delete('/products/{id}','ProductsController@destroy')->middleware(['web','auth']);

Route::get('/issue','IssueController@index')->middleware(['web','auth']);
Route::get('/issue/create/{id}','IssueController@create')->middleware(['web','auth']);
Route::post('/issue/store','IssueController@store')->middleware(['web','auth']);
Route::get('/issue/edit/{id}','IssueController@edit')->middleware(['web','auth']);
Route::get('/fetch_user','IssueController@fetchUser')->middleware(['web','auth']);
Route::get('/issue_details/{id}','IssueController@issue_details')->middleware(['web','auth']);
Route::get('/issue/view','IssueController@view')->middleware(['web','auth']);
Route::post('/issue/return/{id}','IssueController@return')->middleware(['web','auth']);

Route::get('/issue/due_date','IssueController@DueDateView')->middleware(['web','auth']);
Route::post('/issue/due_date','IssueController@fetchIssueData')->middleware(['web','auth']);

Route::get('/profile', 'ProfileController@show')->middleware(['web','auth']);
Route::get('/profile/edit', 'ProfileController@edit')->middleware(['web','auth']);
Route::put('/profile', 'ProfileController@update')->middleware(['web','auth']);