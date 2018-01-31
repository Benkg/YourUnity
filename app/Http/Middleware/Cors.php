<?php

namespace App\Http\Middleware;

use Closure;

/**
* Class Cors
* @package App\Http\Middleware
*/
class Cors {
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', 'https://maps.googleapis.com/*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
	    ->header('Access-Control-Allow-Headers', 'x-csrf-token', '*');
    }
}
