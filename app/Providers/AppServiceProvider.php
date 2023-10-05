<?php

namespace App\Providers;

use App\Repositories\RepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

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
        Request::macro('breadcrumbs', function(){

            return new Breadcrumbs($this);
        });

    }
}
