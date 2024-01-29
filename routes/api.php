<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['localization'])->group(function(){
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::group(["namespace"=>"App\Modules\APIS"],function (){
        Route::post('/auth/login', 'Auth\UserController@login');
        Route::post('/auth/register', 'Auth\UserController@createNewAccount');
        
        
        Route::middleware(['auth:sanctum'])->group(function(){
            Route::post('/auth/otp', 'Auth\UserController@otp');
            Route::post('/auth/logout', 'Auth\UserController@logout');
            
            Route::get('/users-plans','PlanController@users');
            Route::post('/subscribe-plan','PlanController@subscribePlan');
            Route::post('/unsubscribe-plan','PlanController@unSubscribePlan');
            Route::post('/change-plan','PlanController@changePlan');
            
            Route::get('/orders','OrderController@orders');
            Route::get('/single-order/{id}','OrderController@getSingleOrder');
            Route::post('/make-order','PlanController@makeOrder');
            Route::post('/cancel-order','PlanController@cancelOrder');
            Route::post('/update-plan','PlanController@updatePlan');
            
        });
        Route::get('/plans','PlanController@index');
        Route::get('/about-us','PageController@about');
        Route::get('/help','PageController@help');
        Route::get('/terms-conditions','PageController@termsConditions');
        Route::get('/privacy-policy','PageController@privacyPolicy');
        Route::get('/home-banner','HomeSectionController@banner');
        Route::get('/home-sections','HomeSectionController@index');
        Route::get('/about-sections','AboutSectionController@index');
        Route::get('/footer','FooterController@index');
        Route::get('/services','ServiceController@index');
        Route::get('/partners','PartnerController@index');
        Route::get('/faq','FaqController@index');
    });
});








