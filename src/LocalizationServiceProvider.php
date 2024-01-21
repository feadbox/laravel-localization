<?php

namespace Feadbox\Localization;

use Illuminate\Support\ServiceProvider;
use Feadbox\Localization\Services\LocalizationService;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/localization.php', 'localization');

        $this->app->singleton(LocalizationService::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/localization.php' => config_path('localization.php'),
            ], 'localization');
        }
    }
}
