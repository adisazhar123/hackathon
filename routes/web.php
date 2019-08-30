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
// Route::get('/', 'CampaignsController@index');
Route::get('/campaign/type/{campaign_type}', 'CampaignController@getCampaignByType');
Route::get('/campaign/{id}', 'CampaignController@getCampaignById');
Route::get('/campaign/contributor/{id}', 'CampaignController@getCampaignByContributorId');
Route::get('/campaign/campaigner/{id}', 'CampaignController@getCampaignByCampaignerId');
Route::post('/campaign/update/', 'CampaignController@update');

// Route::post('/payment/contribution', 'ContributionController@store');
// middleware('auth')->
Route::resource('/contribution', 'ContributionController');
Route::get('/profile', 'ProfilesController@index');
