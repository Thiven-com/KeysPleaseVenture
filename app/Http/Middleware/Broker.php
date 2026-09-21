<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Broker
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (!Auth::guard('broker')->check()) {

            Log::info('Broker Dash Failed');

            return redirect()->route('broker.login');
        }

        Log::info('Broker Dash');

        return $next($request);
    }
}