<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/customers', 'Admin\AdminController@customers')->name('admin.customer');
Route::get('/admin/products', 'ProductsController@show')->name('admin.products.show');
Route::get('/admin/product-update/{id}', 'ProductsController@update')->name('admin.product.update');
Route::post('/admin/product-update/{id}', 'ProductsController@update')->name('admin.product.update');
Route::get('/admin/product-delete/{id}', 'ProductsController@delete')->name('admin.product.delete');
// Route::get('/admin-login/', 'Admin/AdminController@index')->middleware('admin')->name('admin.login');

