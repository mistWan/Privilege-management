<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * @package App\Models
 */
class Admin extends Authenticatable
{
    /**
     * @var string
     */
    protected $rememberTokenName = '';
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'password'
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, "admin_roles", "admin_id", "role_id")->withPivot(["admin_id", "role_id"])->withTimestamps();
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return !!$role->intersect($this->roles)->count();
    }

    /**
     * @param $permissions
     * @return bool
     */
    public function hasPermission($permissions)
    {
        return $this->hasRole($permissions->roles);
    }

    /**
     * @param $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function contact($role)
    {
        return $this->roles()->save($role);
    }

    /**
     * @param $role
     * @return int
     */
    public function remove($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * @param array $roleId
     * @return bool
     */
    public function contactRoles(array $roleId)
    {
        $this->roles()->detach();
        $roles = Role::whereIn("id", $roleId)->get();
        foreach ($roles as $role) {
            $this->contact($role);
        }
        return true;
    }

}
