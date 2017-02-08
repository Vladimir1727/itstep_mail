<?php

namespace itstep\Http\Middleware;

use Closure;

class SetLocale
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
        //$request - получаемый запрос
        app()->setLocale(\Session::get('locale'));
        return $next($request);
    }
}
