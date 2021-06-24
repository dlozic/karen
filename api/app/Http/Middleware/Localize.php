<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localize
{
    public function handle(Request $request, Closure $next)
    {
        $currentUser = auth()->user();

        /* continue if you are not logged in */
        if(!$currentUser) { return $next($request); }

        $locale = $currentUser->language->short_name;
        App::setLocale($locale);

        return $next($request);
    }
}
