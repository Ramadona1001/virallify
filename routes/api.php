<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['localization'])->group(function(){
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::group(["namespace"=>"App\Modules\APIS"],function (){
        Route::post('/login', 'Auth\UserController@login');
        Route::post('/register', 'Auth\UserController@createNewAccount');
        
        
        Route::middleware(['auth:sanctum'])->group(function(){
            Route::post('/logout', 'Auth\UserController@logout');
            
            Route::post('/subscribe-plan','PlanController@subscribePlan');
            Route::post('/unsubscribe-plan','PlanController@unSubscribePlan');
            Route::post('/change-plan','PlanController@changePlan');
            Route::get('/users-plans','PlanController@users');
            
            Route::get('/orders','OrderController@orders');
            Route::get('/single-order/{id}','OrderController@getSingleOrder');
            Route::post('/make-order','PlanController@makeOrder');
            Route::post('/cancel-order','PlanController@cancelOrder');
            Route::post('/update-plan','PlanController@updatePlan');
            
        });
        Route::get('/plans','PlanController@index');
        Route::get('/pages/{slug}','PageController@page');
        Route::get('/home','HomeSectionController@index');
        Route::get('/contact','ContactController@index');
        Route::post('/send-contact','ContactController@contact');
        Route::get('/footer','FooterController@index');
        Route::get('/services','ServiceController@index');
        Route::get('/social-channels','SocialMediaChannelController@index');
        Route::get('/partners','PartnerController@index');
        Route::get('/faq','FaqController@index');
    });
});









