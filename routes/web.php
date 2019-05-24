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


 Route::get('/home', function () {
 	return view('welcome');
 });
Route::get('/','PageController@getIndex');

Auth::routes(['register' => false]);

// Route::get('/index', 'HomeController@index')->name('index');
Route::get('/logout', 'UserController@getLogout')->name('logout');
Route::get('/index', 'PageController@getIndex')->name('index');
Route::get('/compose', 'PageController@getCompose')->name('compose');
// Route::get('login','HomeController@getLogin');
// Route::get('login','HomeController@postLogin');

// Route::get('index',['as'=>'trang-chu','uses'=>'HomeController@index']);


Route::get('register','UserController@getRegisterAdmin');
Route::post('register','UserController@postRegisterAdmin');

  Route::get('compose',['as'=>'compose','uses'=>'PageController@getCompose']);

  Route::group(['prefix'=>'templates'],function(){
        // xóa templates
      Route::get('xoa/{id}','TemplateController@getXoa');

        // sửa template
      Route::get('sua/{id}','TemplateController@getSua');
      Route::post('sua/{id}','TemplateController@postSua');

        //thêm template
      Route::get('them','TemplateController@getThem');
      Route::post('them','TemplateController@postThem');
  });

  Route::group(['prefix'=>'services'],function(){

        // xóa template
      Route::get('xoa/{id}','ServiceController@destroy');
      //   // sửa template
      // Route::get('edittemp/{id}','ServiceController@getSua');
      // Route::post('edittemp/{id}','ServiceController@postSua');
      //   //thêm template
      // Route::get('addtemp','ServiceController@getThem');
      // Route::post('addtemp','ServiceController@postThem');
  });
