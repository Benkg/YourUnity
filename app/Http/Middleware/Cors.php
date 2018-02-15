<?php

namespace App\Http\Middleware;

use Closure;

class CORS {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //header("Access-Control-Allow-Origin: *");

        $headers = [
	    'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'HEAD, PATCH, POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, Origin, Authorization'
        ];

        if ($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return \Response::make('OK', 200, $headers);
        }


/*if($request->getMethod() == "OPTIONS") {

        $response = new Response();
        foreach($headers as $key => $value)
            $response->headers->set($key, $value);

        return $response;
    }
*/
        $response = $next($request);
        foreach ($headers as $key => $value)
            $response->headers->set($key, $value);
        return $response;
    }
}

