<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Providers;

use Illuminate\Support\Collection;
use N1215\LaraAdr\Console\Commands\UserShowCommand;
use N1215\LaraAdr\Domains\User;
use N1215\LaraAdr\Domains\UserId;
use N1215\LaraAdr\Domains\UserName;
use N1215\LaraAdr\Domains\UserRepositoryInterface;
use N1215\LaraAdr\Infrastructure\UserRepository;
use Illuminate\Support\ServiceProvider;

class LaraAdrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/user.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'lara-adr');
        if ($this->app->runningInConsole()) {
            $this->commands([UserShowCommand::class]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->when(UserRepository::class)
            ->needs(Collection::class)
            ->give(
                function () {
                    return collect(
                        [
                            [1, 'Tom'],
                            [2, 'Jack'],
                        ]
                    )->map(
                        function (array $userData) {
                            return new User(
                                new UserId($userData[0]),
                                new UserName($userData[1])
                            );
                        }
                    );
                }
            );
    }
}
