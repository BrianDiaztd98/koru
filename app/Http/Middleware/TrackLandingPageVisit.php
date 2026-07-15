<?php

namespace App\Http\Middleware;

use App\Models\LandingPageVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tracks a single landing-page visit per browser session.
 *
 * The counting is intentionally performed here (a route middleware) instead of
 * inside the Livewire component's `mount()` because a full-page Livewire
 * component is mounted both for the initial server render and again during
 * Livewire's client-side initialization request. Running the insert in `mount()`
 * caused every real visit to be recorded twice in production. A route middleware
 * executes exactly once per HTTP request to this route, while Livewire's
 * initialization request hits a different endpoint and never reaches it.
 */
class TrackLandingPageVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip authenticated admin users so production stats are not polluted
        // while administrators browse the public site.
        $user = $request->user();

        if ($user === null || ! $user->is_admin) {
            if (! $request->session()->has('landing_page_viewed')) {
                LandingPageVisit::create();
                $request->session()->put('landing_page_viewed', true);
            }
        }

        return $next($request);
    }
}
