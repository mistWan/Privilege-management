<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{

    /**
     * @var Admin
     */
    protected $admin;
    /**
     * @var Role
     */
    protected $role;

    /**
     * AdminController constructor.
     * @param Admin $admin
     * @param Role $role
     */
    public function __construct(Admin $admin, Role $role)
    {
        $this->admin = $admin;
        $this->role = $role;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->admin->paginate(10);
        return view("admin.admin.index", compact("items"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           "name" => "required|min:3" ,
           "password" => "required|min:3"
        ]);
        $this->admin->create($request->only(["name", "password"]));
        return redirect("/admin/admins");
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role(Admin $admin)
    {
        $items = $this->role->get();
        $mines = $admin->roles;
        return view("admin.admin.role", compact("items", "mines", "admin"));
    }

    /**
     * @param Request $request
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function roleStore(Request $request, Admin $admin)
    {
        $bool = $admin->contactRoles($request->get("roles"));
        if ($bool) {
            return redirect("/admin/admins");
        }
    }
}
