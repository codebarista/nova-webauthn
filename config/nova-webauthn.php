<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Two-Factor-Auth
    |--------------------------------------------------------------------------
    |
    | Set a session variable to disable an existing two-factor authentication,
    | such as "google2fa.auth_passed"
    |
    */

    'session' => [
        'disable_2fa_var' => env('DISABLE_2FA_SESSION_VAR', null),
    ],
];
