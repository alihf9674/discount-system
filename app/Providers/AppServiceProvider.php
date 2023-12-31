<?php

namespace App\Providers;

use App\Support\Basket\Basket;
use App\Support\Cost\BasketCost;
use App\Support\Cost\Contracts\CostInterface;
use App\Support\Cost\DiscountCost;
use App\Support\Cost\ShippingCost;
use App\Support\Discount\DiscountManager;
use App\Support\Storage\Contracts\StorageInterface;
use App\Support\Storage\SessionStorage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->app->bind(StorageInterface::class, function () {
            return new SessionStorage('cart');
        });

        $this->app->bind(CostInterface::class, function ($app) {
            $basketCost = new BasketCost($app->make(Basket::class));
            $shippinCost = new ShippingCost($basketCost);
            return new DiscountCost($shippinCost , $app->make(DiscountManager::class));
        });
    }
}
