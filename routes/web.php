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


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('', 'PageController@getIndex')->name('dashboard');

    // Manage SMS
    Route::group(['prefix'=>'manage-sms'], function () {
        // SMS compose
        Route::get('compose', 'PageController@getGroup')->name('compose');
        // SMS draf
    });

    // Manage Templates
    Route::group(['prefix'=>'templates-sms'], function () {
        Route::get('', 'TemplateController@getTemplates')->name('template');

        Route::get('xoa/{id}', 'TemplateController@getXoa')->name('template-del');

        Route::post('sua/{id}', 'TemplateController@getSua')->name('template-edit');
        Route::post('sua/{id}', 'TemplateController@postSua')->name('template-edit');


        Route::get('them', 'TemplateController@getThem')->name('template-add');
        Route::post('them', 'TemplateController@postThem')->name('template-add');

        Route::get('searcht', 'TemplateController@searcht')->name('template-search');

        Route::post('modaltu', ['as'=>'modaltu','uses'=>'TemplateController@modaltu']);
    });

    // Manage Services
    Route::group(['prefix'=>'manage-service'], function () {
        Route::get('', 'ServiceController@getList')->name('services');

        Route::get('xoa/{id}', 'ServiceController@destroy')->name('services-del');

        Route::get('edit/{id}', 'ServiceController@getSua')->name('services-edit');
        Route::post('edit/{id}', 'ServiceController@postSua')->name('services-edit');

        Route::get('add', 'ServiceController@getadd')->name('services-add');
        Route::post('add', 'ServiceController@postadd')->name('services-add');

        Route::get('searchs', 'ServiceController@searchs')->name('service-search');
    });

    // Manage Contact
    Route::group(['prefix'=>'manage-contact'], function () {
        Route::get('', 'ContactController@index')->name('contact-address-book');

        Route::get('add', 'ContactController@getThem')->name('contact-add');
        Route::post('add', 'ContactController@postThem')->name('contact-add');

        Route::get('edit/{id}', 'ContactController@getSua')->name('contact-edit');
        Route::post('edit/{id}', 'ContactController@postSua')->name('contact-edit');

        Route::get('xoa/{id}', 'ContactController@destroy')->name('contact-del');

        Route::get('export', 'ContactController@contactExport')->name('contact.export');
        Route::post('import', 'ContactController@contactImport')->name('contact.import');

        Route::get('searchc', 'ContactController@searchc')->name('contact-search');
    });

    // Manage Group
    Route::group(['prefix'=>'manage-group'], function () {
        Route::get('', 'GroupController@getGroup')->name('contact-group');

        Route::get('add', 'GroupController@getThem')->name('group-add');
        Route::post('add', 'GroupController@postThem')->name('group-add');

        Route::get('edit/{id}', 'GroupController@getSua')->name('group-edit');
        Route::post('edit/{id}', 'GroupController@postSua')->name('group-edit');

        Route::get('xoa/{id}', 'GroupController@destroy')->name('group-del');

        Route::get('searchg', 'GroupController@searchg');
    });

    // Manage Schedule
    Route::group(['prefix'=>'manage-schedule'], function () {
        Route::get('', 'SchedulesController@index')->name('schedule');

        Route::get('add', 'SchedulesController@add');
    });

    // Manage Account
    Route::group(['prefix'=>'manage-account'], function () {
        Route::get('', 'UserController@getlist')->name('account');

        Route::get('xoa/{id}', 'UserController@destroy')->name('account-del');

        Route::get('add', 'UserController@getThem')->name('account-add');
        Route::post('add', 'UserController@postThem')->name('account-add');

        Route::get('edit/{id}', 'UserController@getSua')->name('account-edit');
        Route::post('edit/{id}', 'UserController@postSua')->name('account-edit');

        Route::get('profile', 'UserController@getInfo')->name('account-profile');
        Route::post('profile', 'UserController@postInfo')->name('account-profile');

        Route::get('searchu', 'UserController@searchu');
    });

    // Manage Notice
    Route::group(['prefix'=>'config-notification'], function () {
        Route::get('', 'NoticeController@index')->name('notification');

        Route::get('notice', 'NoticeController@getThem')->name('notice-add');
        Route::post('notice', 'NoticeController@postThem')->name('notice-add');

        Route::get('xoa/{id}', 'NoticeController@destroy')->name('notice-del');
    });

    Route::get('/logout', 'UserController@getLogout')->name('logout');

    Route::get('/compose', 'PageController@getCompose')->name('compose');
    // Route::get('/compose', 'PageController@getDecription')->name('compose.decription');
    Route::post('/compose', 'ExcelController@readImport')->name('compose.import');
    Route::get('/compose', 'PageController@getGroup')->name('compose.group');

    Route::get('autocomplete', 'TemplateController@autocomplete')->name('autocomplete');


    Route::get('/decription', 'PageController@getDecription')->name('decription');
});
