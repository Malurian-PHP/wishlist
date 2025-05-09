<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustVerifyEmailUnauthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // possibly move this to it's own middleware
            // or use a custom exception handler
            return response()->json(['error' => 'User does not exist, check the email and try again.'], 401);
        }

        if (!$user->email_verified_at) {
            return response()->json(['error' => 'Please verify your email.'], 422);
        }
        return $next($request);
    }
}
