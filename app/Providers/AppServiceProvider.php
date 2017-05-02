<?php

namespace App\Providers;

use App\Domains\Users\User;
use App\Domains\Users\UserId;
use App\Domains\Users\UserName;
use App\Domains\Users\UserRepository;
use App\Domains\Users\UserRepositoryInterface;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(UserRepositoryInterface::class, function (Container $app) {
            $usersData = [
                [1, 'Tom'],
                [2, 'Jack'],
            ];

            $userCollection = collect($usersData)
                ->map(function(array $userData) {
                   return new User(
                       new UserId($userData[0]),
                       new UserName($userData[1])
                   );
                });

            return new UserRepository($userCollection);
        });
    }
}
