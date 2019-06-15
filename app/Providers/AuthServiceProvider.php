<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class
    ];

    public function boot()
    {
        $this->registerPolicies();
        $permissions = \App\Models\Permission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->name, function ($admin) use ($permission) {
                return $admin->hasPermission($permission);
            });
        }
    }
}
