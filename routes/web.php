<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::group(['prefix' => 'entities', 'as' => 'entities.'], function () {
    Route::get('/', 'EntityController@index')->name('index');
    Route::get('create', 'EntityController@create')->name('create');
    Route::get('{id}/edit', 'EntityController@edit')->name('edit');
    Route::post('store', 'EntityController@store')->name('store');
    Route::delete('{id}', 'EntityController@destroy')->name('destroy');
    Route::get('{id}/restore', 'EntityController@restore')->name('restore');

    Route::group(['prefix' => '{entity_id}/fields', 'as' => 'fields.'], function () {
        Route::get('create', 'FieldController@create')->name('create');
        Route::post('store', 'FieldController@store')->name('store');
        Route::delete('{id}', 'FieldController@destroy')->name('destroy');
    });
});
