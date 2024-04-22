<?php

namespace Hellodit\CustomerProduct\Http\Middleware;

use Closure;

class IsUserVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guard('customer')->check()) {
            if (auth()->guard('customer')->user()->is_verify){
                return $next($request);
            }
            return redirect()->route('shop.otp.index');
        }
        return $next($request);
    }
}
