<?php

Route::group(['prefix' => 'project','middleware' => 'web'], function() {
    Route::get('demo', 'Bantenprov\Project\Http\Controllers\ProjectController@demo');

    Route::get('/','Bantenprov\Project\Http\Controllers\ProjectController@index')->name('projectIndex');

    Route::get('/view/{id}','Bantenprov\Project\Http\Controllers\ProjectController@show')->name('projectShow');

    Route::get('/edit/{id}','Bantenprov\Project\Http\Controllers\ProjectController@edit')->name('projectEdit');

    Route::get('/delete/{id}','Bantenprov\Project\Http\Controllers\ProjectController@destroy')->name('projectDelete');

    Route::get('create', 'Bantenprov\Project\Http\Controllers\ProjectController@create')->name('projectCreate');
    
    Route::post('store', 'Bantenprov\Project\Http\Controllers\ProjectController@store')->name('projectStore');
});
