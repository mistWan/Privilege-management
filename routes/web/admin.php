<?php


Route::group(["prefix" => "admin", "namespace" => "admin"], function() {
    Route::get("login", "LoginController@index")->name('login');
    Route::post("login", "LoginController@login");
    Route::get("logout", "LoginController@logout");

    Route::group(['middleware' => 'auth:admin'], function() {
        Route::get("/", "IndexController@index");
        Route::get("index", "IndexController@index");

        Route::group(["middleware" => "can:permissions"], function () {
            Route::get("admins", "AdminController@index");
            Route::post("admins/store", "AdminController@store");
            Route::get("admins/{admin}/role", "AdminController@role");
            Route::post("admins/{admin}/store", "AdminController@roleStore");

            Route::get("roles", "RoleController@index");
            Route::post("roles/store", "RoleController@store");
            Route::get("roles/{role}/permission", "RoleController@permission");
            Route::post("roles/{role}/store", "RoleController@permissionStore");

            Route::get("permissions", "PermissionController@index");
            Route::post("permissions/store", "PermissionController@store");
        });

        Route::group(["middleware" => "can:posts"], function () {
            Route::get("posts", "PostController@index");
            Route::get("posts/{id}/status/{status}", "PostController@update");

            Route::get("posts/export", "ExcelController@postExport");
            Route::post("posts/import", "ExcelController@postImport");
        });

        Route::group(["middleware" => "can:notices"], function () {
            Route::get("notices", "NoticeController@index");
            Route::get("notices/create", "NoticeController@create");
            Route::post("notices", "NoticeController@store");
        });
    });

});