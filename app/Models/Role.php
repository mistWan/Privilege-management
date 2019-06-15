<?php

namespace App\Models;

/**
 * Class Role
 * @package App\Models
 */
class Role extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, "role_permissions", "role_id", "permission_id")->withPivot(["role_id", "permission_id"])->withTimestamps();
    }

    /**
     * @param $permission
     * @return mixed
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }

    /**
     * @param $permission
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function contact($permission)
    {
        return $this->permissions()->save($permission);
    }

    /**
     * @param $permission
     * @return int
     */
    public function remove($permission)
    {
        return $this->permissions()->detach($permission);
    }

    /**
     * @param array $permissionId
     * @return bool
     */
    public function contactPermissions(array $permissionId)
    {
        $this->permissions()->detach();
        $permissions = Permission::whereIn("id", $permissionId)->get();
        foreach ($permissions as $permission) {
            $this->contact($permission);
        }
        return true;
    }

}
