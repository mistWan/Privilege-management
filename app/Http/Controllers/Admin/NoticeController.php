<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notice;
use Illuminate\Http\Request;

/**
 * Class NoticeController
 * @package App\Http\Controllers\Admin
 */
class NoticeController extends Controller
{
    /**
     * @var Notice
     */
    private $notice;

    /**
     * NoticeController constructor.
     * @param Notice $notice
     */
    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->notice->latest()->paginate(10);
        return view("admin.notice.index", compact("items"));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("admin.notice.create");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $notice = $this->notice->create($request->only(["title", "content"]));
        dispatch(new \App\Jobs\ProcessNotice($notice));
        return redirect("/admin/notices");
    }
}
