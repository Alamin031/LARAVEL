<?php

return [
    'defaults' => [
        'guard' => 'api', // Change the default guard to 'api'
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [ // Add a new guard for API authentication
            'driver' => 'jwt', // Set the driver to 'jwt'
            'provider' => 'users', // Use the 'users' provider
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
