<?php

namespace Invertus\Log\Vendor;

use Illuminate\Support\ServiceProvider;

class LoggingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('log', function ($app) {
            return new LogManager($app);
        });

        $this->mergeConfigFrom(__DIR__ . '../config/logging.php', 'logging');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '../config/logging.php' => $this->app->configPath('logging.php'),
        ]);
    }
}
