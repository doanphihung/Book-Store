<?php

namespace App\Providers;

use App\Http\Controllers\RoleConstant;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-manage', function ($user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->id === RoleConstant::ROLE_ADMIN) {
                    return true;
                }
                return false;
            }
        });

        Gate::define('can-view-DashBoard', function ($user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->id === RoleConstant::ROLE_ADMIN || $role->id === RoleConstant::ROLE_USER) {
                    return true;
                }
                return false;
            }
        });
    }
}
