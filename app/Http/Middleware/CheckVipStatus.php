<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVipStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->query('vip_code');

        if ($token !== 'platinum_access') {
            return response()->json([
                'message' => 'Access Denied. You are not on the VIP List.',
            ], 403);
        }

        return $next($request);
    }
}
