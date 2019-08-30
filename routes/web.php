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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create_campaign','CampaignController@create');
Route::get('/campaigns/type/{campaign_type}', 'CampaignController@getCampaignByType');
// Route::post('/payment/contribution', 'ContributionController@store');

Route::middleware('auth')->post('/payment/contribution', 'ContributionController@store');
