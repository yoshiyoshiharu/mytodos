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
//リスト一覧
Route::get('/' , 'ListingsController@index');
//リスト新規作成
Route::get('/new' , 'ListingsController@new')->name('new');
//リストの保存
Route::post('/listingsstore' , 'ListingsController@store');
//リストの編集
Route::get('/listingsedit/{listing_id}' , 'ListingsController@edit');
//リストの更新
Route::patch('/listingsupdate' , 'ListingsController@update');
//リストの削除
Route::get('/listingsdelete/{listing_id}' ,'ListingsController@destroy');

//カード新規作成
Route::get('/cardsnew/{listing_id}' , 'CardsController@new');
//カードの保存
Route::post('/cardsstore' , 'CardsController@store');
//カードの編集
Route::get('/cardsedit/{card_id}' , 'CardsController@edit');
//カードの更新
Route::patch('/cardsupdate' , 'CardsController@update');
//カードの削除
Route::get('/cardsdelete/{card_id}' ,'CardsController@destroy');

Auth::routes();

Route::get('/home', 'ListingsController@index');
