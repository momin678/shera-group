<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['middleware'=> 'PreventBackHistory'])->group(function(){
  Auth::routes(['verify' => true]);
});
Route::group(['prefix' =>'admin', 'middleware'=> ['isAdmin','auth', 'PreventBackHistory'] ], function(){
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('profile', 'AdminController@profile')->name('admin.profile');
    Route::get('settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/smtp-settings', 'BusinessSettingsController@smtp_settings')->name('smtp_settings');
    Route::get('/social-login', 'BusinessSettingsController@social_login')->name('social_login');
    Route::post('/env_key_update', 'BusinessSettingsController@env_key_update')->name('env_key_update.update');
    Route::post('/newsletter/test/smtp', 'NewsletterController@testEmail')->name('test.smtp');
    Route::group(['prefix' => 'website'], function() {
      Route::view('/header', 'backend.website_settings.header')->name('website.header');
      Route::view('/left-sidebar', 'backend.website_settings.left_sidebar')->name('website.left-sidebar');
      Route::view('/pages', 'backend.website_settings.pages.index')->name('website.pages');
      Route::view('/appearance', 'backend.website_settings.appearance')->name('website.appearance');
      Route::get('/home-slider', 'BusinessSettingsController@home_slider')->name('business_settings.home-slider');
      Route::get('/home-slider-delete/{id}', 'BusinessSettingsController@home_slider_delete')->name('business_settings.home-slider-delete');
      Route::post('/business-settings/topLogo', 'BusinessSettingsController@sideTopLogo')->name('business_settings.sideTopLogo');
      Route::post('/business-settings/home-slider-update', 'BusinessSettingsController@home_slider_update')->name('business_settings.home-slider-update');
    });
    Route::get('/activation', 'BusinessSettingsController@activation')->name('activation.index');
    Route::post('/business-settings/update', 'BusinessSettingsController@update')->name('business_settings.update');
});
// staff with role and permission route
Route::group(['prefix' =>'admin/staffs', 'middleware'=> ['isAdmin','auth', 'PreventBackHistory'] ], function(){
  Route::resource('staff', 'StaffController', ['names' => 'staff']);
  Route::resource('role', 'RolesController', ['names' => 'role']);
  Route::resource('permission', 'PermissionController', ['names' => 'permission']);
  Route::post('permission-add/{id}', 'PermissionController@permission_add')->name('permission.add');
  Route::get('permission-group-edit/{id}', 'PermissionController@permission_group_edit')->name('permission-group-edit');
  Route::get('permission-group-delete/{id}', 'PermissionController@permission_group_delete')->name('permission-group-delete');
});
// Product, category, brand, attribute route
Route::group(['prefix'=>'admin/products', 'middleware'=>['isAdmin','auth', 'PreventBackHistory']], function(){
  Route::resource('product', 'ProductController', ['names' => 'product']);
  Route::get('/admin/products', 'ProductController@admin_products')->name('admin.products');
  Route::post('/sku_combination/products', 'ProductController@sku_combination')->name('sku_combination.products');
  Route::resource('category', 'CategoryController', ['names' => 'category']);
  Route::delete('cat_delete', "CategoryController@cat_delete")->name('admin.category-delete');
  Route::post('/category/featured', 'CategoryController@updateActive')->name('admin.category.active');
  Route::resource('brand', 'BrandController', ['names' => 'brand']);
  Route::post('/brand/featured', 'BrandController@updateActive')->name('admin.brand.active');
  Route::delete('brand_delete', "BrandController@brand_delete")->name('admin.brand-delete');
  Route::resource('attribute', 'AttributeController', ['names' => 'attributes']);
  Route::delete('attribute_delete', "AttributeController@attribute_delete")->name('admin.attribute-delete');
});

