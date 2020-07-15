<?php

namespace OptimistDigital\NovaSettings\Http\Middleware;

use Laravel\Nova\Nova;
use OptimistDigital\NovaSettings\NovaSettings;

class SettingsDomainExists
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        $domain = $request->has('domain') ? $request->get('domain') : '_';

        return NovaSettings::isDomainExists($domain) ? $next($request) : abort(404);
    }
}
