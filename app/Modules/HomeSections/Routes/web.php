<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "HomeSections\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/home-sections")->group(function () {
                Route::get('/', 'HomeSectionController@index')->name('show_home_sections');
                Route::get('/edit/{home_section}', 'HomeSectionController@edit')->name('edit_home_sections');
                Route::get('/delete/{home_section}', 'HomeSectionController@delete')->name('delete_home_sections');
                Route::post('/store', 'HomeSectionController@store')->name('store_home_sections');
                Route::post('/update/{home_section}', 'HomeSectionController@update')->name('update_home_sections');
                Route::get('/delete-gallery/{gallery}', 'HomeSectionController@deleteGallery')->name('delete_gallery_home_sections');

            });
        });
    });
});
