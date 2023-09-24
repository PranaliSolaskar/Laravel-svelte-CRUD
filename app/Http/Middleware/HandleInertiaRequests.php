<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
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
        return $next($request);
    }

    public function share(Request $request): array
    {
        $flash = [
            'warning' => $request->session()->get('warning'),
            'success' => $request->session()->get('success'),
            'info' => $request->session()->get('info'),
        ];

        return array_merge(parent::share($request), [
            'flash' => $flash,
            // Other shared data if needed
        ]);
    }
}


