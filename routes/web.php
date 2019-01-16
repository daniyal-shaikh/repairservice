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

// Route::get('/checklogin', function () {
//     return view('welcome');
// });

Route::get('/','LoginController@checklogin');

Route::get('register','RegisterController@register');
Route::post('login','LoginController@login');

//------------------Company Master-------------------------
Route::get('dashboard','DashboardController@viewdashboard');
Route::get('company-master','CompanyMasterController@companymaster');
Route::post('add-company','CompanyMasterController@addcompany');
Route::post('edit-company','CompanyMasterController@editcompany');
Route::get('del-company/{cid}','CompanyMasterController@delcompany');

//-----------------Modal Master-----------------------------
Route::get('model-master','ModalMasterController@modelmaster');
Route::post('add-modal','ModalMasterController@addmodal');
Route::get('edit-model/{model_id}','ModalMasterController@editmodel');
Route::post('edit-save-model','ModalMasterController@editsavemodel');
Route::get('del-model/{mid}','ModalMasterController@delmodel');

//---------------Issue Master-----------------------------
Route::get('issue-master','IssueMasterController@issuemaster');
Route::post('add-issue','IssueMasterController@addissue');
Route::post('edit-issue','IssueMasterController@editissue');
Route::get('del-issue/{isseid}','IssueMasterController@delissue');

//----------------Price Master-----------------------------
Route::get('price-master','PriceMasterController@pricemaster');
Route::post('add-price','PriceMasterController@addprice');
Route::get('view-update-price/{priceid}','PriceMasterController@viewupdateprice');
Route::post('update-save-price','PriceMasterController@updatesaveprice');
Route::get('del-price/{prid}','PriceMasterController@delprice');

//------------------------------------------------------------
Route::get('FindProductIssuePrice','FindProductIssuePriceController@index_find_price');
Route::get('get-model-depend-company/{companyid}','FindProductIssuePriceController@getmodeldependcompany');

Route::get('get-price/{comid}/{mid}/{iid}','FindProductIssuePriceController@getprice');


