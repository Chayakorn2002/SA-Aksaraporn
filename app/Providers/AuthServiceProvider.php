<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\StaffPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        User::class => AdminPolicy::class,
        User::class => StaffPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isAdmin', [AdminPolicy::class, 'isAdmin']);
        Gate::define('isStaff', [StaffPolicy::class, 'isStaff']);
        Gate::define('isUser', [UserPolicy::class, 'isUser']);
    }
}
