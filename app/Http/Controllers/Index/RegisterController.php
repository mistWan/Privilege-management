<?php

namespace App\Http\Controllers\Index;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Index
 */
class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("index.register.index");
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(User $user)
    {
        $this->validate(request(), [
            "name" => "required|min:3|unique:users,name",
            "email" => "required|unique:users,email|email",
            "password" => "required|min:3|confirmed"
        ]);
        $create = $user->create(array_merge(["password" => request("password")], request(["name", "email"])));
        if ($create) {
            return redirect("/login");
        }
        return redirect("/register");
    }
}
