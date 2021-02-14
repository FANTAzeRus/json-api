<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/', function () {
    return view('api');
});

//MetaForm
Route::middleware('api')->prefix('meta-form')->group(function () {
    Route::get('/init', "MetaFormController@init");
    Route::post('/register', "MetaFormController@register");
    Route::post('/login', "MetaFormController@login");
});

Route::middleware('auth_api')->prefix('meta-form')->group(function () {
    Route::get('/news', "MetaFormController@news");
    Route::post('/news', "MetaFormController@add_news");
});

//Statistics
Route::middleware('api')->prefix('stat')->group(function () {
    Route::get('/init', "StatController@init");
    Route::get('/views', "StatController@views");
});

//Media News  v2
Route::middleware('api')->prefix('media')->group(function () {
    Route::get('/get-app-config', "MediaController@getAppConfig");
    Route::get('/top-news', "MediaController@getTopNews");
    Route::get('/news', "MediaController@getNews");
    Route::get('/articles', "MediaController@getArticles");
});

//Vue3 Cart
Route::middleware('api')->prefix('vue3-cart')->group(function () {
    Route::get('/init', 'Vue3CartPre@init');
});
