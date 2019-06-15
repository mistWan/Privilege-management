<?php

Route::group(["namespace" => "index", 'prefix' => ''], function () {
    Route::get("/register", "RegisterController@index");
    Route::post("/register", "RegisterController@register");
    Route::get("/login", "LoginController@index");
    Route::post("/login", "LoginController@login");
    Route::get("/logout", "LoginController@logout");

    Route::get("posts", "PostController@index");
    Route::get("posts/create", "PostController@create");
    Route::post("posts", "PostController@store");
    Route::get("posts/search", "PostController@search");
    Route::get("posts/{post}", "PostController@show");
    Route::get("posts/{post}/edit", "PostController@edit");
    Route::put("posts/{post}", "PostController@update");

    Route::get("notices", "NoticeController@index");

});
