<?php

return [

    /**
     * See the all locales in: https://github.com/mcamara/laravel-localization/blob/master/src/config/config.php
     */
    'supported_locales' => [
        'en' => [
            'name' => 'English',
            'script' => 'Latn',
            'native' => 'English',
            'regional' => 'en_GB'
        ],
        'ru' => [
            'name' => 'Russian',
            'script' => 'Cyrl',
            'native' => 'русский',
            'regional' => 'ru_RU'
        ],
        'ar' => [
            'name' => 'Arabic',
            'script' => 'Arab',
            'native' => 'العربية',
            'regional' => 'ar_AE'
        ],
        'fr' => [
            'name' => 'French',
            'script' => 'Latn',
            'native' => 'français',
            'regional' => 'fr_FR'
        ],
    ],

    'order' => ['en', 'ru', 'fr', 'ar'],

];
