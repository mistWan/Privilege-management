<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

/**
 * Class LoginController
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("admin.login.index");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            "name" => "required|min:3",
            "password" => "required|min:3"
        ]);
        $user = $request->only(["name", "password"]);
        if (\Auth::guard('admin')->attempt($user)) {
            return redirect("/admin");
        }
        return redirect()->back()->withErrors("账号或密码有误，请重试！");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
