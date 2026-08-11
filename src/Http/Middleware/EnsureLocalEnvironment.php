<?php

namespace LaravelEgypt\DataLens\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureLocalEnvironment
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!config('datalens.enabled', true)) {
            abort(403, 'DataLens is disabled.');
        }

        if (!app()->environment('local', 'testing')) {
            abort(403, 'DataLens is only available in local or testing environments.');
        }

        return $next($request);
    }
}
