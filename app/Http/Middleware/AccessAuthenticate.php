<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $accessKey = config('classicModels.access_key');
        $requestAccessKey = $request->header('X-Access-Key');
        
        if ($requestAccessKey !== $accessKey) {
            return response(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
