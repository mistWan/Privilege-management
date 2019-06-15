<?php

namespace App\Http\Controllers\Index;


/**
 * Class NoticeController
 * @package App\Http\Controllers\Index
 */
class NoticeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = \Auth::user();
        $items = $user->notices;
        return view("index.notice.index",compact("items"));
    }
}
