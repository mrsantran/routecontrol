<?php

namespace SanTran\RouteControl;

use Illuminate\Support\ServiceProvider;

class RouteControlServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('routecontrol', function () {
            return new RouteControl();
        });
        $this->app->alias('routecontrol', 'SanTran\RouteControl\RouteControl');
    }

}
