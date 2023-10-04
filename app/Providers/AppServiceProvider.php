<?php

namespace App\Providers;

use App\Repositories\RepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, userRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // for bootstrap used --> 
        Paginator::useBootstrap();

    }
}
