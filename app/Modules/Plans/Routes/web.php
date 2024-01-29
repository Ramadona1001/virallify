<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Plans\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/plans")->group(function () {
                Route::get('/', 'PlanController@index')->name('show_plans');
                Route::get('/properties', 'PlanController@properties')->name('show_plans_properties');
                Route::post('/store-properties', 'PlanController@addPropertyPlan')->name('store_properties_plans');
                Route::get('/delete-property-plan/{plan}', 'PlanController@deleteProperty')->name('delete_property_plans');
                Route::get('/edit/{plan}', 'PlanController@edit')->name('edit_plans');
                Route::get('/delete/{plan}', 'PlanController@delete')->name('delete_plans');
                Route::post('/store', 'PlanController@store')->name('store_plans');
                Route::post('/update/{plan}', 'PlanController@update')->name('update_plans');
                Route::get('/users/{plan}', 'PlanController@users')->name('show_users_plans');
                Route::post('/add-users', 'PlanController@addUserPlan')->name('store_users_plans');
                Route::get('/remove-users/{user_plan}', 'PlanController@removeUserPlan')->name('remove_users_plans');

            });
        });
    });
});
