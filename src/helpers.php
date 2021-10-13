<?php

use Feadbox\Seo\Services\LocalizationService;

if (!function_exists('localize')) {
    function localize(): LocalizationService
    {
        return app(LocalizationService::class);
    }
}
