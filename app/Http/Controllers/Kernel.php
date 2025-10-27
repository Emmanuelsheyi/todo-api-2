<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     *
     * These middleware run during every request.
     */
    protected $middleware = [
        // Handles CORS (Cross-Origin Resource Sharing)
        \App\Http\Middleware\HandleCors::class,

        // Prevents requests when app is in maintenance mode
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Validates the size of POST requests
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Converts empty strings to null
        \App\Http\Middleware\TrimStrings::class,
    ];

    /**
     * The application's route middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];
}
