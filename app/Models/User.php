<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notices()
    {
        return $this->belongsToMany(\App\Models\Notice::class, "user_notices", "user_id", "notice_id")->withPivot(["user_id", "notice_id"])->withTimestamps();
    }

    /**
     * @param $notice
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addNotice($notice)
    {
        return $this->notices()->save($notice);
    }

    /**
     * @param $notice
     * @return int
     */
    public function deleteNotice($notice)
    {
        return $this->notices()->detach($notice);
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
