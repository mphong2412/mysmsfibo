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
Route::get('/index', 'PageController@getIndex');
Route::get('/', 'PageController@getIndex');


Auth::routes(['register' => false]);

Route::get('templates', ['as'=>'template','uses'=>'TemplateController@getTemplates']);

Route::get('notices', ['as'=>'notice','uses'=>'NoticeController@index']);

Route::get('searcht', ['as'=>'searcht','uses'=>'TemplateController@searcht']);

Route::post('modaltu', ['as'=>'modaltu','uses'=>'TemplateController@modaltu']);

Route::get('searchg', ['as'=>'searchg','uses'=>'GroupController@searchg']);

Route::get('searchs', ['as'=>'searchs','uses'=>'ServiceController@searchs']);

Route::get('searchc', ['as'=>'searchc','uses'=>'ContactController@searchc']);

Route::get('searchu', ['as'=>'searchu','uses'=>'UserController@searchu']);

Route::get('group', ['as'=>'group','uses'=>'GroupController@getGroup']);

Route::get('contact', ['as'=>'contact','uses'=>'ContactController@index']);
Route::get('/logout', 'UserController@getLogout')->name('logout');

Route::get('/compose', 'PageController@getCompose')->name('compose');
// Route::get('/compose', 'PageController@getDecription')->name('compose.decription');
Route::post('/compose', 'ExcelController@readImport')->name('compose.import');
Route::get('/compose','PageController@getGroup')->name('compose.group');

Route::get('autocomplete', 'TemplateController@autocomplete')->name('autocomplete');

Route::get('them', 'TemplateController@getThem');
Route::post('them', 'TemplateController@postThem');

Route::get('notice', ['as'=>'notices','uses'=>'NoticeController@getThem']);
Route::post('notice', ['as'=>'notices','uses'=>'NoticeController@postThem']);

Route::get('xoa/{id}', ['as'=>'notices','uses'=>'NoticeController@destroy']);

Route::get('services', ['as'=>'service','uses'=>'ServiceController@getList']);



Route::get('/decription','PageController@getDecription')->name('decription');

  Route::group(['prefix'=>'templates'], function () {
      // xóa templates
      Route::get('xoa/{id}', 'TemplateController@getXoa');

      // sửa template
      Route::get('sua/{id}', 'TemplateController@getSua');
      Route::post('sua/{id}', 'TemplateController@postSua');

      //thêm template
      Route::get('them', 'TemplateController@getThem');
      Route::post('them', 'TemplateController@postThem');
  });

  Route::group(['prefix'=>'services'], function () {

        // xóa template
      Route::get('xoa/{id}', 'ServiceController@destroy');

      //   // sửa template
      Route::get('edit/{id}', 'ServiceController@getSua');
      Route::post('edit/{id}', 'ServiceController@postSua');

      //   //thêm template
      Route::get('add', 'ServiceController@getadd');
      Route::post('add', 'ServiceController@postadd');
  });

  Route::group(['prefix'=>'groups'], function () {
      Route::get('add', 'GroupController@getThem');
      Route::post('add', 'GroupController@postThem');

      Route::get('edit/{id}', 'GroupController@getSua');
      Route::post('edit/{id}', 'GroupController@postSua');

      Route::get('xoa/{id}', 'GroupController@destroy');
  });

  Route::group(['prefix'=>'contacts'], function () {
      Route::get('list', 'ContactController@index');

      Route::get('add', 'ContactController@getThem');
      Route::post('add', 'ContactController@postThem');

      Route::get('edit/{id}', 'ContactController@getSua');
      Route::post('edit/{id}', 'ContactController@postSua');

      Route::get('xoa/{id}', 'ContactController@destroy');

      Route::get('export', 'ContactController@contactExport')->name('contact.export');
      Route::post('import', 'ContactController@contactImport')->name('contact.import');
  });


  Route::group(['prefix'=>'users'], function () {
      Route::get('list', 'UserController@getlist');

      Route::get('xoa/{id}', 'UserController@destroy')->name('users.xoa');

      Route::get('add', 'UserController@getThem');
      Route::post('add', 'UserController@postThem');

      Route::get('edit/{id}', 'UserController@getSua');
      Route::post('edit/{id}', 'UserController@postSua');

      Route::get('profile', ['as'=>'account','uses'=>'UserController@getInfo']);
      Route::post('profile', ['as'=>'account','uses'=>'UserController@postInfo']);
  });

  Route::group(['prefix'=>'schedules'], function () {
      Route::get('list', 'SchedulesController@index');

      Route::get('add', 'SchedulesController@add');
  });
