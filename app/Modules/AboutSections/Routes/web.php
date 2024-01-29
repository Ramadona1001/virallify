<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "AboutSections\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/about-sections")->group(function () {
                Route::get('/', 'AboutSectionController@index')->name('show_about_sections');
                Route::get('/edit/{about_section}', 'AboutSectionController@edit')->name('edit_about_sections');
                Route::get('/delete/{about_section}', 'AboutSectionController@delete')->name('delete_about_sections');
                Route::post('/store', 'AboutSectionController@store')->name('store_about_sections');
                Route::post('/update/{about_section}', 'AboutSectionController@update')->name('update_about_sections');
                Route::get('/delete-gallery/{gallery}', 'AboutSectionController@deleteGallery')->name('delete_gallery_about_sections');

            });
        });
    });
});
