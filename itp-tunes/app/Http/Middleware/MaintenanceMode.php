<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class MaintenanceMode
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
        $maintenance = DB::table('configurations')->where('name', '=', 'maintainence')->first();

        $inMaintenance = ($maintenance->value == 'on');

        if (!$inMaintenance){
          return $next($request);
        } else {
          return redirect('/maintenance');
        }

    }
}
