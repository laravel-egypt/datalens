<?php

return [
    'enabled' => env('DATALENS_ENABLED', true),
    'path' => env('DATALENS_PATH', 'dev/datalens'),
    'middleware' => [
        'web',
        \LaravelEgypt\DataLens\Http\Middleware\EnsureLocalEnvironment::class,
    ],
    // Auto-detected connections will be merged with these custom/additional connections
    'additional_connections' => [
        // Example for custom/runtime connections:
        // 'external_db' => [
        //     'driver' => 'mysql',
        //     'host' => env('EXTERNAL_DB_HOST', '127.0.0.1'),
        //     'port' => env('EXTERNAL_DB_PORT', '3306'),
        //     'database' => env('EXTERNAL_DB_DATABASE', 'forge'),
        //     'username' => env('EXTERNAL_DB_USERNAME', 'forge'),
        //     'password' => env('EXTERNAL_DB_PASSWORD', ''),
        // ],
    ],
];
