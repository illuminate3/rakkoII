<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

	'github' => [
		'client_id' => getenv('GITHUB_CLIENT_ID'),
		'client_secret' => getenv('GITHUB_CLIENT_SECRET'),
		'redirect' => getenv('GITHUB_REDIRECT')
	],

/**
 * Google
 *
 * Go to https://console.developers.google.com/project/['your porject name']/apiui/credential
 * to ge the infomation for the the following.
 *
 */
	'google' => [
		'client_id' => getenv('GOOGLE_CLIENT_ID'),
		'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
		'redirect' => getenv('GOOGLE_REDIRECT')
	]


];
