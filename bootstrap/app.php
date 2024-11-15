<?php

use App\Http\Middleware\CheckGraduate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
       // Register 'check.graduate' alias with the CheckGraduate middleware class
    $middleware->alias(
        ['check_graduate' => CheckGraduate::class]
    );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
