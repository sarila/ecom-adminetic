<?php

namespace App\Providers;

use App\Repositories\TaxRepository;
use App\Repositories\UnitRepository;
use Illuminate\Pagination\Paginator;
use App\Repositories\BrandRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Contracts\TaxRepositoryInterface;
use App\Contracts\UnitRepositoryInterface;
use App\Contracts\BrandRepositoryInterface;
use App\Contracts\CategoryRepositoryInterface;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* Repository Interface Binding */
        $this->repos();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Registering Blade Directives
        Paginator::useBootstrap();
    }

    // Repository Interface Binding
    protected function repos()
    {
        $this->app->bind(TaxRepositoryInterface::class, TaxRepository::class);
        $this->app->bind(UnitRepositoryInterface::class, UnitRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        // $this->app->bind(AnnouncementRepositoryInterface::class, AnnouncementRepository::class);
    }
}
