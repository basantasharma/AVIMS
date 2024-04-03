<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersRolesController;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (\Auth::check()) {
            // Get the authenticated user's ID
            $userId = \Auth::id();
            $count = 0;
            foreach ($roles as $role) {

                $roleId = (new RoleController())->getRoleId($role);
                $hasRole = (new UsersRolesController())->hasUserRole($userId, $roleId);
                // allow the request to proceed. Otherwise, return a 403 error.
                if($hasRole)//&& $hasEditPermission
                {   
                    $count++;
                    // return $next($request);
                }
            }
            if($count<=0) 
            {
                $count=0;
                return back()->with('failed', 'sorry you are not authorized to access');
                //abort(403, 'Unauthorized action.');
            }
            else
            {
                $count=0;
                return $next($request);

            }
        } else {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('login');
        }
    }
}
