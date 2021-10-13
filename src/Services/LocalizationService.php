<?php

namespace Feadbox\Localization\Services;

use Illuminate\Support\Str;

class LocalizationService
{
    public function setLocale()
    {
        if (app()->runningInConsole()) {
            return;
        }

        $locale = request()->segment(1);

        if (in_array($locale, $this->localeCodes())) {
            return $locale;
        }
    }

    public function route($name, $language, $parameters = [], $absolute = true): string
    {
        $route = app('url')->route($name, $parameters, $absolute);

        return $this->url($route, $language);
    }

    public function url(string $url, string $language): string
    {
        return Str::replaceFirst('/' . app()->getLocale() . '/', "/{$language}/", $url);
    }

    public function currentUrl(string $language): string
    {
        $base = url()->to('');
        $path = str_replace($base, '', request()->fullUrl());

        return $base . '/' . $language . $path;
    }

    public function supportedLocales($withoutCurrent = false)
    {
        $locales = $this->localeCodes();

        if ($withoutCurrent === false) {
            return $locales;
        }

        return array_filter($locales, function ($locale) {
            return $locale !== app()->getLocale();
        });
    }

    public function localeCodes(): array
    {
        return array_keys(config('localization.supported_locales'));
    }
}
