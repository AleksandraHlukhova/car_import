<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// home
Route::get('/', 'MainController@index')->name('index');
// poduct-details
Route::get('/product/{id}', 'MainController@product')->name('product');

Route::group([
        'middleware' => 'auth'
    ], function(){
        //request form
        Route::get('/request-form', 'RequestController@request')->name('request');
        Route::post('/request-form', 'RequestController@request')->name('request');

        //bookmarks
        Route::get('/bookmark-add/{id}', 'BookmarkController@add')->name('bookmark.add');

        //cart
        Route::get('/cart', 'CartController@show')->name('cart.show');
        Route::get('/product/{id}/add/to-cart', 'CartController@add')->name('cart.add');
        Route::get('/cart/product/{id}/delete', 'CartController@productDelete')->name('cart.product.delete');

        //profile
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::get('/logout', 'ProfileController@logout')->name('logout');

        //profile-propositions
        Route::get('/profile/propositions', 'PropositionController@show')->middleware('auth')->name('proposition.show');
        Route::post('/profile/proposition/{id}/change-status', 'PropositionController@propositionChangeStatus')->name('proposition.change.status');
        
        //profile-bookmarks
        Route::get('/profile/bookmarks', 'BookmarkController@show')->name('bookmark.show');
        
        //profile-requests
        Route::get('/profile/requests', 'RequestController@show')->name('request.show');

});

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::group([
    'middleware' => 'auth',
    'middleware' => 'is_admin'
], function(){
//admin
Route::get('/admin', 'Admin\AdminController@index')->name('admin.admin');
Route::get('/admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
});
//orders
Route::get('/admin/orders', 'Admin\OrderController@show')->name('admin.orders.show');
Route::post('/admin/order/{id}/paid-status/change', 'Admin\OrderController@edit')->name('admin.order.paid-status.edit');
Route::post('/admin/order/{id}/readiness-status/change', 'Admin\OrderController@edit')->name('admin.order.readiness-status.edit');

//customers
Route::get('/admin/customers', 'Admin\CustomerController@customers')->name('admin.customers');

//requests
Route::get('/admin/requests', 'Admin\RequestController@show')->name('admin.requests.show');

//propositions
Route::get('/admin/propositions/{id}/select', 'Admin\PropositionController@select')->name('admin.proposition.select');
Route::get('/admin/proposition/{id}/add', 'Admin\PropositionController@add')->name('admin.proposition.add');
Route::get('/admin/propositions/for-request-{id}/show', 'Admin\PropositionController@show')->name('admin.proposition.show');
Route::get('/admin/proposition/{id}/delete', 'Admin\PropositionController@delete')->name('admin.proposition.delete');

//products
Route::get('/admin/products', 'Admin\ProductController@show')->name('admin.products.show');
///product crud operations
Route::get('/admin/product/create', 'Admin\ProductController@createForm')->name('admin.product.create');
Route::post('/admin/product/create', 'Admin\ProductController@create')->name('admin.product.create');
Route::get('/admin/product/{id}/update', 'Admin\ProductController@updateForm')->name('admin.product.update');
Route::post('/admin/product/{id}/update', 'Admin\ProductController@update')->name('admin.product.update');
Route::get('/admin/product/{id}/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
Route::get('/admin/product/{id}/photo/delete', 'Admin\ProductController@photoDelete')->name('admin.photo.delete');



