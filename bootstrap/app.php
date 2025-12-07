<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // REGISTER MIDDLEWARE GROUP ADMIN
        $middleware->group('admin', [
            \App\Http\Middleware\AdminRole::class,
        ]);

        // REGISTER MIDDLEWARE GROUP USER
        $middleware->group('user', [
            \App\Http\Middleware\UserRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
