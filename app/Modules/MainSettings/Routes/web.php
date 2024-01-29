<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "MainSettings\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/main-settings")->group(function () {
                Route::get('/view', 'MainSettingController@index')->name('mainsettings');
                Route::post('/save', 'MainSettingController@save')->name('save_mainsettings');
                Route::post('/update/{mainSetting}', 'MainSettingController@update')->name('update_mainsettings');
                Route::get('/menu-builder', 'MainSettingController@menuBuilder')->name('menu_builder');
                Route::post('/update-menu', 'MainSettingController@updateMenu')->name('update_menus');
            });
        });
    });
});
