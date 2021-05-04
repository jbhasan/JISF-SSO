<?php

namespace Sayeed\JisfSSO\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
		'jisf.auth' => \App\Http\Middleware\JisfAuthenticate::class,
    ];
}
