<?php

use Monolog\Handler\NullHandler;

return [
    'default' => env('LOG_CHANNEL', 'stack'),

    /** @see https://laravel.com/docs/10.x/logging#creating-custom-channels-via-factories */
    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => \Illuminate\Container\Container::getInstance()->storagePath() . '/logs/laravel.log',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => \Monolog\Handler\StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' =>  \Illuminate\Container\Container::getInstance()->storagePath() . '/logs/laravel.log',
        ],
    ],
];
