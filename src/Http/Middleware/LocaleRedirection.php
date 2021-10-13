<?php

namespace Feadbox\Localization\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleRedirection
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
        $locale = $request->segment(1);
        $supportedLocales = config('localization.supported_locales');

        if (!in_array($locale, $supportedLocales)) {
            abort(redirect()->to(
                localize()->currentUrl($request->getPreferredLanguage($supportedLocales))
            ));
        }

        App::setLocale($locale);

        return $next($request);
    }
}
