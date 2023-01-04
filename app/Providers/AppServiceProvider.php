<?php

namespace App\Providers;

use App\Modifiers\ShippingModifier;
use Lunar\Base\ShippingModifiers;
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
    public function boot(ShippingModifiers $shippingModifiers)
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        
        $shippingModifiers->add(
            ShippingModifier::class
        );
    }
}
