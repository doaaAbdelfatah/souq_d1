<?php


Route::get('/', function () {
    return view('dashboard');
});


Route::group(['prefix' => '/category'], function () {
    Route::get('/', "CategoryController@index");
    Route::get('/delete/{id}', "CategoryController@destroy");
    Route::get('/edit/{id}', "CategoryController@edit");
    Route::post('/add', "CategoryController@store");
});


Route::group(['prefix' => '/sub_category'], function () {
 
    Route::get('/delete/{id}', "SubCategoryController@destroy");
    Route::get('/edit/{id}', "SubCategoryController@edit");
    Route::post('/add', "SubCategoryController@store");
});

Route::group(['prefix' => '/brand'], function () {
    Route::get('/', "BrandController@index");
    Route::post('/add', "BrandController@store");
    Route::get('/delete/{id}', "BrandController@destroy");

});

Route::get("/test" ,"TestController@test");

