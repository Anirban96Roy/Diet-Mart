<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 
     protected function redirectTo(Request $request): ?string
     {
        return $request->expectJson() ? null : route('account.login');
     }
     //suppose i am not loggin in but want to access something in the auth middleware then it will take us account.login
}
