<?php

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
    // Custom redirect for guests depending on auth guard
    $middleware->redirectGuestsTo(function (\Illuminate\Http\Request $request) {
        $route = $request->route();

        if ($route) {
            // All middleware on the current route (strings like "auth:client", "auth:web", etc.)
            $middlewares = $route->gatherMiddleware();

            foreach ($middlewares as $mw) {
                if (is_string($mw) && str_starts_with($mw, 'auth:')) {
                    [$name, $guard] = array_pad(explode(':', $mw, 2), 2, null);
                    if ($guard === 'client') {
                        // Not logged in & route has auth:client → go to client login
                        return route('client.login');
                    }

                    if ($guard === 'web') {
                        // Not logged in & route has auth:web → go to admin login
                        return route('login');
                    }
                }
            }
        }

        // Fallback (if route doesn't have auth:client or auth:web)
        return route('client.login'); // أو اختار أي لوجين عام عندك
    });
})

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
