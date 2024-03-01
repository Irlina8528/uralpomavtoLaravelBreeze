<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserType;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        $user = Auth::user();
        
        $userType = UserType::find($user->id_usertype);
        
        if ($userType && in_array($userType->name, $types)) {
            return $next($request);
        }
        
        abort(401, 'Unauthorized');
    }
}
