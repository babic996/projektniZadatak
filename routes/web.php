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

Route::get('/', function () {
    return view('home');
})->name('home');
//Rute za proizvod
Route::get('product/create','App\Http\Controllers\ProductController@create')->name('create.product');
Route::post('product/create','App\Http\Controllers\ProductController@store')->name('store.product');
Route::get('product/index','App\Http\Controllers\ProductController@index')->name('index.product');
Route::delete('product/delete/{product}','App\Http\Controllers\ProductController@destroy')->name('destroy.product');
Route::get('product/edit/{product}','App\Http\Controllers\ProductController@edit')->name('edit.product');
Route::patch('product/update/{product}','App\Http\Controllers\ProductController@update')->name('update.product');

//Rute za inspekcijsko tijelo
Route::get('body-inspection/create','App\Http\Controllers\BodyInspectionController@create')->name('create.body-inspections');
Route::post('body-inspection/create','App\Http\Controllers\BodyInspectionController@store')->name('store.body-inspections');
Route::get('body-inspection/index','App\Http\Controllers\BodyInspectionController@index')->name('index.body-inspections');
Route::delete('body-inspection/delete/{bodyInspection}','App\Http\Controllers\BodyInspectionController@destroy')->name('destroy.body-inspections');
Route::get('body-inspection/edit/{bodyInspection}','App\Http\Controllers\BodyInspectionController@edit')->name('edit.body-inspections');
Route::patch('body-inspection/update/{bodyInspection}','App\Http\Controllers\BodyInspectionController@update')->name('update.body-inspections');

//Rute za evidenciju kontrola
Route::get('record/create','App\Http\Controllers\RecordController@create')->name('create.record');
Route::post('record/create','App\Http\Controllers\RecordController@store')->name('store.record');
Route::get('record/index','App\Http\Controllers\RecordController@index')->name('index.record');
Route::delete('record/delete/{record}','App\Http\Controllers\RecordController@destroy')->name('destroy.record');
Route::get('record/edit/{record}','App\Http\Controllers\RecordController@edit')->name('edit.record');
Route::patch('record/update/{record}','App\Http\Controllers\RecordController@update')->name('update.record');



