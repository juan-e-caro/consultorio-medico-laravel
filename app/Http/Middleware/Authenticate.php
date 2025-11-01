<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Obtiene la ruta a la que se debe redirigir si el usuario no está autenticado.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login'); // o puedes dejarlo como null si es solo API
        }
    }
}
