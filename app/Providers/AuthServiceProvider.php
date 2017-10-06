<?php

namespace App\Providers;

use App\Judge\Contest;
use Carbon\Carbon;
use Laravel\Passport\Passport;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::enableImplicitGrant();
        Passport::tokensExpireIn(Carbon::now()->addHours(6));

        // Access contest
        Gate::define('access-contest', function ($user, $contest) {
            return $contest->users()->where('user_id', $user->id)->exists();
        });
        // Contest allow to submit
        Gate::define('submit-contest', function ($user, Contest $contest) {
            $start = Carbon::parse($contest->start);
            $end = Carbon::parse($contest->end);
            return Carbon::now()->between($start, $end);
        });
        // Admin
    }
}
