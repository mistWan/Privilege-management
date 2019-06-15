<?php

namespace App\Http\Controllers\Index;
use \App\Http\Controllers\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers\Index
 */
class Controller extends BaseController
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->middleware("auth", ["only" => ["create", "store", "edit", "update"]]);
    }
}