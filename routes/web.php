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

Route::get('/', 'MainController@index')->name('index');
Route::get('/product/{id}', 'MainController@product')->name('product');
Route::get('/bookmark-add/{id}', 'BookmarkController@add')->name('bookmark.add');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('profile');
Route::get('/logout', 'ProfileController@logout')->name('logout');

Route::get('/profile/propositions', 'PropositionController@show')->name('proposition.show');
Route::get('/profile/bookmarks', 'BookmarkController@show')->name('bookmark.show');


Route::get('/admin', 'Admin\AdminController@index')->name('admin.admin');
Route::get('/admin/orders', 'Admin\OrdersController@show')->name('admin.orders.show');
Route::get('/admin/customers', 'Admin\AdminController@customers')->name('admin.customers');
Route::get('/admin/products', 'Admin\ProductsController@show')->name('admin.products.show');
Route::get('/admin/requests', 'Admin\RequestsController@show')->name('admin.requests.show');
Route::get('/admin/propositions/{id}/select', 'PropositionsController@select')->name('admin.proposition.select');
Route::get('/admin/propositions/{id}/add', 'PropositionsController@add')->name('admin.proposition.add');

///product crud operations
Route::get('/admin/product/create', 'Admin\ProductsController@create')->name('admin.product.create');
Route::post('/admin/product/create', 'Admin\ProductsController@create')->name('admin.product.create');
Route::get('/admin/product/{id}/update', 'Admin\ProductsController@update')->name('admin.product.update');
Route::post('/admin/product/{id}/update', 'Admin\ProductsController@update')->name('admin.product.update');
Route::get('/admin/product/{id}/delete', 'Admin\ProductsController@delete')->name('admin.product.delete');
Route::get('/admin/product/{id}/photo/delete', 'Admin\ProductsController@photoDelete')->name('admin.photo.delete');

Route::post('/admin/order/{id}/paid-status/change', 'Admin\OrdersController@edit')->name('admin.order.paid-status.edit');
Route::post('/admin/order/{id}/readiness-status/change', 'Admin\OrdersController@edit')->name('admin.order.readiness-status.edit');
// Route::get('/admin-login/', 'Admin/AdminController@index')->middleware('admin')->name('admin.login');

