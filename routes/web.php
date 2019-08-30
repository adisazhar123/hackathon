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

Route::post('/create_campaign','CampaignController@create');
Route::get('/campaign/type/{campaign_type}', 'CampaignController@getCampaignByType');
Route::get('/campaign/{id}', 'CampaignController@getCampaignById');
Route::get('/campaign/contributor/{id}', 'CampaignController@getCampaignByContributorId');
Route::get('/campaign/campaigner/{id}', 'CampaignController@getCampaignByCampaignerId');
Route::post('/campaign/update/', 'CampaignController@update');
Route::post('/campaign_item','CampaignItemController@create');
Route::get('/campaign_item', 'CampaignItemController@getCampaignItems');