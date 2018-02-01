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
	$headers = [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers'=> 'X-CSRF-TOKEN, Content-Type, X-Auth-Token, Origin, Authorization'
        ];

    if($request->getMethod() == "OPTIONS") {

        $response = new Response();
        foreach($headers as $key => $value)
            $response->headers->set($key, $value);

        return $response;
    }

    $response = $next($request);

    foreach($headers as $key => $value)
        $response->headers->set($key, $value);

    return $response;

      /*  return $next($request)
            //->header('Access-Control-Allow-Origin',  '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
	    ->header('Access-Control-Allow-Headers', 'X-CSRF-TOKEN', 'accept', 'content-type', 'x-xsrf-token')
	    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
 */  }
}
