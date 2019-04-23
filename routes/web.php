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

Route::get('/','IndexController@index')->name('index');
Route::get('/test','IndexController@index3');

Route::get('single/{product}','IndexController@single')->name('single.page');

Route::post('cart/{product}','IndexController@cart')->name('cart');
Route::get('cart','IndexController@cart_index')->name('cart.index');
Route::get('cart/destroy/{product}','IndexController@destroy_cart')->name('cart.destroy');

Route::get('data','OrderController@data')->name('data');
Route::post('payment','OrderController@payment')->name('payment');
Route::post('finish','OrderController@finish')->name('finish');
Route::get('factor','OrderController@factor')->name('factor');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {

    $this::resource('/user', 'UserController');
    $this::resource('/role', 'RoleController');
    $this::resource('/permission', 'PermissionController');
    $this::resource('/laptop','LaptopController');
});

Route::get('admin/laptop/gallery/{product}','Admin\LaptopController@gallery')->name('laptop.gallery');
Route::get('admin/laptop/destroy_image/{image}','Admin\LaptopController@destroy_image')->name('laptop.destroy_image');
Route::post('admin/laptop/store_thumbnail/{image}','Admin\LaptopController@store_thumbnail')->name('laptop.store_thumbnail');
Route::get('admin/laptop/destroy_thumbnail/{image}','Admin\LaptopController@destroy_thumbnail')->name('laptop.destroy_thumbnail');
Route::post('admin/laptop/upload/{product}','Admin\LaptopController@upload')->name('laptop.upload');

Route::get('admin/slider/create','Admin\SliderController@create')->name('slider.create');
Route::post('admin/slider/upload','Admin\SliderController@upload')->name('slider.upload');
Route::get('admin/slider/destroy_image/{image}','Admin\SliderController@destroy_image')->name('slider.destroy_image');
Route::get('admin/slider/link','Admin\SliderController@link')->name('slider.link');
Route::post('admin/slider/store/{image}','Admin\SliderController@store')->name('slider.store');

Route::get('admin/baner/create','Admin\BanerController@create')->name('baner.create');
Route::post('admin/baner/store/{image}','Admin\BanerController@store')->name('baner.store');

Route::get('search/{key}','IndexController@search_cat')->name('search.cat');

Route::post('ref_num/{product}','IndexController@ref_num')->name('ref.num');


Route:: get('admin/orders','OrderController@admin_list')->name('order.admin_list');
Route:: get('admin/order/{o}','OrderController@admin_factor')->name('order.admin_factor');
Route:: get('admin/order_destroy/{o}','OrderController@destroy')->name('order.destroy');
Route::post('status/{order}','OrderController@status')->name('order.status');

Route::post('search/index','IndexController@search_index')->name('search.index');

Route:: get('panel/order','IndexController@panel_order')->name('panel.order');

Route:: get('admin/ask/inbox','Admin\AskController@inbox')->name('ask.inbox');
Route:: get('admin/ask/create','Admin\AskController@create')->name('ask.create');
Route::post('admin/ask/store','Admin\AskController@store')->name('ask.store');
Route:: get('admin/ask_destroy/{ask}','Admin\AskController@destroy')->name('ask.destroy');
Route:: get('admin/ask_reply/{ask}','Admin\AskController@reply')->name('ask.reply');
Route::post('admin/ask/reply_store','Admin\AskController@reply_store')->name('ask.reply_store');
Route:: get('admin/ask/outbox','Admin\AskController@outbox')->name('ask.outbox');
Route:: get('admin/show/{ask}','Admin\AskController@show')->name('ask.show');

Route:: get('ask/inbox','Ask_userController@inbox')->name('ask_user.inbox');
Route:: get('ask_reply/{ask}','Ask_userController@reply')->name('ask_user.reply');
Route::post('ask/reply_store','Ask_userController@reply_store')->name('ask_user.reply_store');
Route:: get('ask/create','Ask_userController@create')->name('ask_user.create');
Route::post('ask/store','Ask_userController@store')->name('ask_user.store');
Route:: get('ask/outbox','Ask_userController@outbox')->name('ask_user.outbox');
Route:: get('show/{ask}','Ask_userController@show')->name('ask_user.show');

Route:: get('profile','ProfileController@index')->name('profile');
Route:: get('profile/edit','ProfileController@edit')->name('profile.edit');
Route:: post('profile/update','ProfileController@update')->name('profile.update');

Route::get('favorite_ajax/{product}','FavoriteController@favorite')->name('favorite');
Route::get('favorite','FavoriteController@index')->name('favorite.index');
Route::get('favorite/destroy/{product}','FavoriteController@destroy_favorite')->name('favorite.destroy');

Route::get('compare/index/{product}','CompareController@index')->name('compare.index');
Route::get('compare/search/{product}','CompareController@compare_search')->name('compare.search');
Route::get('compare/{product}','CompareController@compare')->name('compare');
Route::get('compare/destroy/{product}','CompareController@destroy')->name('compare.destroy');


Route::get('login/redirect','Admin\LaptopController@gallery')->middleware('Login_redirect');

Route::get('image-view','ImageController@index');
Route::post('image-view','ImageController@store');









