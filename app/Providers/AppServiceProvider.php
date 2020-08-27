<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Centauri\CMS\Centauri;
use Centauri\CMS\Component\ExtensionsComponent;

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
        $extensionsComponent = Centauri::makeInstance(ExtensionsComponent::class);
        $extensionsComponent->loadExtensions();

        /** @todo a proper way of doing this with a way of dynamic... */
        // Blade::directive("images", function($fileReference) {
        //     dd($fileReference);
        // });
    }
}
