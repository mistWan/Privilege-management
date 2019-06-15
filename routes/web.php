<?php

Route::get('/', function () {
    return redirect("/posts");
});
include_once __DIR__ . "/web/index.php";
include_once __DIR__ . "/web/admin.php";
