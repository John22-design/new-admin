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
    // Configure authentication middleware to redirect to login page
    $middleware->redirectGuestsTo('/auth/login-basic');
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
