<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Driver
    |--------------------------------------------------------------------------
    |
    | Laravel supports both SMTP and PHP's "mail" function as drivers for the
    | sending of e-mail. You may specify which one you're using throughout
    | your application here. By default, Laravel is setup for SMTP mail.
    |
    | Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill",
    |            "ses", "sparkpost", "log"
    |
    */

    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.sendgrid.com'),
    'port' => env('MAIL_PORT', 587),
    'from' => ['address' => 'a@acdubs.com', 'name' => 'Adam'],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME', 'a@acdubs.com'),
    'password' => env('MAIL_PASSWORD', '4719iSB$55yZD&t74'),
    'sendmail' => '/usr/sbin/sendmail -bs',

];
