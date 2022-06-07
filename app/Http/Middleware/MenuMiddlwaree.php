<?php

namespace App\Http\Middleware;

use App\Models\admin\Permission;
use Closure;
use Illuminate\Http\Request;

class MenuMiddlwaree
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
        $menu_tree = [];
        $menu_arr = [];
        $user = $request->session()->get('user');
        $menus = Permission::all()->toArray();

        foreach ($menus as $m) {
            $menu_tree[$m['id']] = $m;
        }
        return $next($request);
    }
}
