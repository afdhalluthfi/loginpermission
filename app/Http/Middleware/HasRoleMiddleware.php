<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Role;

class HasRoleMiddleware
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
        $role=Role::get();
        if($request->user()->hasAnyRole($role)){
            return $next($request);
        }else{
            abort(404);
        }
    }
}
