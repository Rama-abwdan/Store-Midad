<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization as FacadesLaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleFromSession
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $local = session('locale', config('app.locale'));
        if(FacadesLaravelLocalization::checkLocaleInSupportedLocales($local)){
            app()->setLocale($local);
        }
        return $next($request);
    }
}
