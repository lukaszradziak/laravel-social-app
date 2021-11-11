<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PusherWebhook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $hash = hash_hmac(
            "sha256",
            json_encode($request->all()),
            config('broadcasting.connections.pusher.secret'),
            false
        );

        if($request->header('x-pusher-signature') !== $hash){
            return abort(403, 'invalid_webhook_signature');
        }

        return $next($request);
    }
}
