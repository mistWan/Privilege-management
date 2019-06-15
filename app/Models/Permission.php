<?php

namespace App\Models;

use Illuminate\Support\Facades\App;

/**
 * Class Permission
 * @package App\Models
 */
class Permission extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, "role_permissions", "permission_id", "role_id")->withPivot(['permission_id', 'role_id'])->withTimestamps();
    }
}
