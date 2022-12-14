<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Is_terdaftar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('terdaftar') || Session::get('npm_terdaftar') )
        {
            return $next($request);
        }
        return redirect()->route('dashboard-mhs')->with(['toast_error'	=> 'Silahkan Melengkapi Biodata Diri']);
    }
}
