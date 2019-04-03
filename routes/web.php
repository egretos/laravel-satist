<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'fields', 'as' => 'fields.'], function () {
    Route::get('/', 'FieldController@index')->name('index');
});

Route::group(['prefix' => 'types', 'as' => 'types.'], function () {
    Route::get('/', 'TypeController@index')->name('index');
    Route::get('create', 'TypeController@create')->name('create');
    Route::post('stote', 'TypeController@store')->name('store');
});
