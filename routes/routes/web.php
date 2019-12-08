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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('index',function(){
//     return view('index');
// });


Route::get('index','shoppingController@getListProduct');

Route::get('home/{id}','UserLoginAndregister@getHome');

Route::get('logout','UserLoginAndregister@getLogout');

Route::get('login','UserLoginAndregister@getLogin');
Route::post('login','UserLoginAndregister@login');

Route::get('register','UserLoginAndregister@getRegister');
Route::post('register','UserLoginAndregister@register');

Route::get('edit_info/{id}','UserLoginAndregister@getEditInfo');
Route::post('edit_info/{id}','UserLoginAndregister@postEditInfo');

Route::get('shopping',function(){
    return view('shopping');
});

Route::get('add_product',function(){
    return view('add_product');
});

Route::post('add_product','adminController@postAddProduct');
Route::get('list_product','adminController@listProduct');

Route::get('single/{bill}/{id}','shoppingController@getSingleProduct');

Route::get('add_to_cart/{b}/{id}','shoppingController@addToCart');

Route::get('cart/{id}','shoppingController@getCart');


Route::get('order/{id}/{total}','shoppingController@postOrder');

Route::get('delete/{bill}/{id}','shoppingController@deleteBillDetail');
