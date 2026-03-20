<?php

namespace DjurovicIgoor\LaraJsonResponse;

use Illuminate\Support\ServiceProvider;

class LaraJsonResponseServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerHelpers();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('laraResponse', function ($app) {
            return new LaraJsonResponse();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return ['larajsonresponse'];
    }

    /**
     * Register the package helpers file.
     *
     * @return void
     */
    public function registerHelpers(): void
    {
        if (file_exists($file = __DIR__ . '/Helpers/functions.php')) {
            require $file;
        }
    }
}
