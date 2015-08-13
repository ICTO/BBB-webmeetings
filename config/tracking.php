<?php

return [
    // Enable tracking
    'enable' => env('TRACKING_ENABLE', false),

    // Omit the protocol ( tracking.com/piwik )
    'url' => env('TRACKING_URL'),

    // Site id
    'site_id' => env('TRACKING_SITEID'),
];