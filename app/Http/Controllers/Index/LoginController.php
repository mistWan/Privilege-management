<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Class LoginController
 * @package App\Http\Controllers\Index
 */
class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("index.login.index");
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(User $user)
    {

        $this->validate(request(), [
            "name" => "required|min:3",
            "password" => "required|min:3",
            "remember" => "integer"
        ]);
        $remember = boolval(request("remember"));
        if (!$remember) {
            return redirect()->back()->withErrors("请勾选 记住我 选项！");
        }
        if (\Auth::attempt(['email' => request("name"), 'password' => request("password")], $remember)) {
            return redirect("/posts");
        }
        if (\Auth::attempt(['name' => request("name"), 'password' => request("password")], $remember)) {
            return redirect("/posts");
        }
        return redirect()->back()->withErrors("账号或密码有误，请重试！");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Auth::logout();
        return redirect("/login");
    }
}
