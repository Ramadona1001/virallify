<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Sections\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/sections")->group(function () {
                Route::get('/', 'SectionController@index')->name('show_sections');
                Route::get('/edit/{section}', 'SectionController@edit')->name('edit_sections');
                Route::get('/delete/{section}', 'SectionController@delete')->name('delete_sections');
                Route::post('/store', 'SectionController@store')->name('store_sections');
                Route::post('/update/{section}', 'SectionController@update')->name('update_sections');
                Route::get('/delete-gallery/{gallery}', 'SectionController@deleteGallery')->name('delete_gallery_sections');

            });
        });
    });
});
