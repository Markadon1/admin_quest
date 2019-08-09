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

Route::get('/', 'PagesController@main');
Route::get('cards', 'PagesController@cards');

Route::get('cards/create_cvest','CvestController@redirect_to_create');

Route::get('multi','PagesController@multi');

Route::post('/multi/add_photo','AjaxController@add_photo');
Route::post('/load_photo_rest','AjaxController@load_cont');
Route::post('/multi/add_photo_restore','AjaxController@add_photo_restore');
Route::post('/multi/main','AjaxController@photo_main');
Route::post('/multi/delete','AjaxController@photo_delete');

Route::post('/add_address','CvestController@create_address');
Route::post('/cards/add_quest','CvestController@create_cvest');
Route::get('cards/restore','CvestController@restore_cvest');
Route::post('cards/delete','CvestController@delete_cvest');


Route::post('/add_cashbox','AjaxController@add_cashbox');
Route::post('/add_cost','AjaxController@add_cost');
Route::get('/costs','AjaxController@costs');
Route::get('/payment','AjaxController@payment');
Route::get('/pay/menu','AjaxController@pay_content');
Route::get('/workers','PagesController@workers');
Route::get('/workers/create','WorkersController@redirect_to_create');
Route::get('/workers/update','WorkersController@redirect_to_update');
Route::post('/worker/create','WorkersController@create');
Route::post('/workers/update/delete_quest','WorkersController@delete_quest');
Route::get('/profile','PagesController@profile');
Route::post('/profile/create','ProfileController@create');
Route::post('/profile/change','ProfileController@redirect_to_create');
Route::post('cashbox/delete','AjaxController@delete_cashbox');
Route::get('contragent/create','AjaxController@contragent');
Route::get('/contragent/content','AjaxController@contragent_content');
Route::post('contragent/send','AjaxController@contragent_create');
Route::post('contragent/delete','AjaxController@contragent_delete');

Route::post('/add_balance','BalanceController@create');
Route::post('add_payment','AjaxController@add_payment');
Route::post('/payment/delete','AjaxController@add_payment');

Route::post('/login/enter','Auth\LoginController@enter');

Route::post('register/change_type', 'AjaxController@reg_change');
Route::post('register/send', 'Auth\RegisterController@create');
Route::post('register/success','Auth\RegisterController@success');

Route::get('register/{token}', 'Auth\RegisterController@confirmEmail');

Route::get('reset','Auth\ResetPasswordController@index');
Route::post('reset/send','Auth\ResetPasswordController@send');
Route::get('reset/{token}', 'Auth\ResetPasswordController@reset');
Route::post('reset/confirm', 'Auth\ResetPasswordController@save');

Route::post('/cards/menu', 'AjaxController@cards_menu');
Route::post('/cards/stock_menu', 'AjaxController@stock_menu');

Route::post('/promo/create','StockController@add_promo');
Route::post('/stock/create','StockController@add_stock');
Route::post('certificate/create','StockController@add_certificate');

Route::post('cards/bonus/create','AjaxController@stock_create');

Auth::routes();