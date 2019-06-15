<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends Controller
{
    /**
     * @var Role
     */
    protected $role;
    /**
     * @var Permission
     */
    protected $permission;

    /**
     * RoleController constructor.
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->role->paginate(10);
        return view("admin.role.index", compact("items"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->role->create($request->only(["name", "content"]));
        return back();
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission(Role $role)
    {
        $items = $this->permission->get();
        $mines = $role->permissions;
        return view("admin.role.permission", compact("items", "mines", "role"));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function permissionStore(Request $request, Role $role)
    {
        $bool = $role->contactPermissions($request->get("permissions"));
        if ($bool) {
            return redirect("admin/roles");
        }
    }
}
