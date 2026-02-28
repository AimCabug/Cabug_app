<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function ($app) {
            $products = [
                ['id' => 1, 'name' => 'Laptop', 'price' => 999.99],
                ['id' => 2, 'name' => 'Smartphone', 'price' => 499.99],
                ['id' => 3, 'name' => 'Headphones', 'price' => 199.99],
            ];

            return new ProductService($products);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey', 'abc123');
    }
}
