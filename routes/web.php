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
Route::get('/index','PageController@getIndex');
Route::get('/','PageController@getIndex');


Auth::routes(['register' => false]);

Route::get('templates',['as'=>'template','uses'=>'PageController@getTemplates']);

Route::get('notices',['as'=>'notice','uses'=>'NoticeController@index']);


Route::get('searcht',['as'=>'searcht','uses'=>'TemplateController@searcht']);

Route::get('searchg',['as'=>'searchg','uses'=>'GroupController@searchg']);

Route::get('searchs',['as'=>'searchs','uses'=>'ServiceController@searchs']);

Route::get('searchc',['as'=>'searchc','uses'=>'ContactController@searchc']);

Route::get('group',['as'=>'group','uses'=>'GroupController@getGroup']);
Route::get('contact',['as'=>'contact','uses'=>'ContactController@index']);
Route::get('/logout','UserController@getLogout')->name('logout');

Route::get('/compose','PageController@getCompose')->name('compose');
Route::post('/compose','PageController@postCompose')->name('compose');



Route::get('them','TemplateController@getThem');
Route::post('them','TemplateController@postThem');

Route::get('services',['as'=>'service','uses'=>'ServiceController@getList']);


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
      Route::get('edit/{id}','ServiceController@getSua');
      Route::post('edit/{id}','ServiceController@postSua');

      //   //thêm template
      Route::get('add','ServiceController@getadd');
      Route::post('add','ServiceController@postadd');
  });

  Route::group(['prefix'=>'groups'],function(){

    Route::get('add','GroupController@getThem');
    Route::post('add','GroupController@postThem');

    Route::get('edit/{id}','GroupController@getSua');
    Route::post('edit/{id}','GroupController@postSua');

    Route::get('xoa/{id}','GroupController@destroy');

  });

  Route::group(['prefix'=>'contacts'],function(){

      Route::get('list','ContactController@index');

      Route::get('add','ContactController@getThem');
      Route::post('add','ContactController@postThem');

      Route::get('edit/{id}','ContactController@getSua');
      Route::post('edit/{id}','ContactController@postSua');

      Route::get('xoa/{id}','ContactController@destroy');

      Route::get('export','ContactController@contactExport')->name('contact.export');
      Route::get('import','ContactController@ContactsImport')->name('contact.import');
  });
