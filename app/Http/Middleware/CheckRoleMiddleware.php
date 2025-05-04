<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        $user = Auth::user();   
        if (!$user) {
            return redirect()->route('home');   
        }
        
        if ($user->role !== $role) {
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.statistics');

                case 'employee':
                    return redirect()->route('employee.users.index');
                
                default:
                    return redirect()->route('client.home');
            }
        }
        return $next($request);
    }
}