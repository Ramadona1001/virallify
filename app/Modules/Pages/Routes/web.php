<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Pages\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/pages")->group(function () {
                Route::get('/', 'PageController@index')->name('show_pages');
                Route::post('/store', 'PageController@store')->name('store_pages');
                Route::get('/edit/{p}', 'PageController@edit')->name('edit_pages');
                Route::post('/update/{p}', 'PageController@update')->name('update_pages');
                Route::get('/delete/{p}', 'PageController@delete')->name('destroy_pages');
            });
        });
    });
});
