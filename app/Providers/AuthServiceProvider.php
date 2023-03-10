<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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

        Gate::define('categories', [UserPolicy::class, 'categories']);
        Gate::define('brands', [UserPolicy::class, 'brands']);
        Gate::define('attributes', [UserPolicy::class, 'attributes']);
        Gate::define('products', [UserPolicy::class, 'products']);
        Gate::define('customers', [UserPolicy::class, 'customers']);
        Gate::define('verifications', [UserPolicy::class, 'verifications']);
        Gate::define('locations', [UserPolicy::class, 'locations']);
        Gate::define('users', [UserPolicy::class, 'users']);
        Gate::define('authAttempts', [UserPolicy::class, 'authAttempts']);
        Gate::define('ipAddresses', [UserPolicy::class, 'ipAddresses']);
        Gate::define('userAgents', [UserPolicy::class, 'userAgents']);
    }
}
