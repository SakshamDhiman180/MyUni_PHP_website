<?php

return [
    'admin_email' => env('ADMIN_EMAIL', 'support@sjd.tnd.mybluehost.me'),
    'gyft' => [
        'api_key' => env('GYFT_API_KEY'),
        'api_secret' => env('GYFT_API_SECRET'),
        'base_url' => env('GYFT_API_BASE_URL')
    ],
    'platform_fee' => env('PLATFORM_FEE', 15),
    'websocket_url' => env('WEBSOCKET_URL', 'ws://localhost:8090'),
    'amazonCardMerchantId' => "21-1346844962949-58",
    'fcm_server_key' => env('FCM_SERVER_KEY'),
    'websocket_port' => env('WEBSOCKET_PORT', 8090)
];
