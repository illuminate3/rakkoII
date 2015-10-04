<?php

return [

/*
|--------------------------------------------------------------------------
| Third Party Services
|--------------------------------------------------------------------------
|
| This file is for storing the credentials for third party services
| Default locations for this type of information, allowing packages
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
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],


/*
|--------------------------------------------------------------------------
| SocialLite choices
|--------------------------------------------------------------------------
|
| Open Registration: IF verified create user
| true / false
|
| Semi Registration: User data is partially in database, update info from Oauth
| true / false
|
*/
'open_registration'				=> false,
'semi_registration'				=> true,


/*
|--------------------------------------------------------------------------
| SocialLite choices
|--------------------------------------------------------------------------
|
| facebook, twitter, google, and github
|
| settings
|
*/
'outh_provider'					=> getenv('OAUTH_PROVIDER'),
'oauth_domain_limiter'			=> getenv('OAUTH_DOMAIN_LIMITER'),

/*
|
| Github
|--------------------------------------------------------------------------
|
*/
	'github' => [
		'client_id' => getenv('GITHUB_CLIENT_ID'),
		'client_secret' => getenv('GITHUB_CLIENT_SECRET'),
		'redirect' => getenv('GITHUB_REDIRECT')
	],

/*
|
| Google
|--------------------------------------------------------------------------
|
| Go to https://console.developers.google.com/project/['your porject name']/apiui/credential
| to ge the infomation for the the following.
|
*/
	'google' => [
		'client_id' => getenv('GOOGLE_CLIENT_ID'),
		'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
		'redirect' => getenv('GOOGLE_REDIRECT')
	]

];
