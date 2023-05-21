<?php

namespace App\Providers;

use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
    }
}