<?php

namespace Sayeed\JisfSSO;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Sayeed\JisfSSO\Http\Middleware\JisfAuthenticate;

class JisfSSOServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->loadRoutesFrom(__DIR__ . '/routes/web.php');


		$router = $this->app->make(Router::class);
		$router->aliasMiddleware('sso.auth', JisfAuthenticate::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		$this->mergeConfigFrom(
			__DIR__.'/config/jisf.php', 'jisf'
		);
    }
}
