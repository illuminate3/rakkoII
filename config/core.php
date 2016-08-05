<?php

// php artisan vendor:publish --provider="App\Modules\Core\Providers\CoreServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Core\Providers\CoreServiceProvider" --tag="views"


return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'core_db' => array(
	'prefix'					=> '',
),

/*
|--------------------------------------------------------------------------
| Core configs used for naming conventions
|--------------------------------------------------------------------------
*/
// 	'title'							=> 'Rakko : ラッコ',
// 	'brand_title'					=> 'Rakko',
// 	'author'						=> 'https://github.com/illuminate3, illuminate3',
// 	'keywords'						=> 'Laravel, bootstrap, starter, modules, Authentification, Authorization, user management, roles, permissions, groups, laravel',
// 	'description'					=> 'Rakko is a Larvael 5 based app that allows you to build with modules',
// 	'footer'						=> 'Rakko © 2015 - github.com/illuminate3',
	'title'							=> 'Bryant Public School',
	'brand_title'					=> 'Bryant Public School',
	'author'						=> 'https://github.com/illuminate3, illuminate3',
	'keywords'						=> 'Bryant, Public, Schools, District, Arkanasa, Hornets, School, Saline',
	'description'					=> 'Bryant School District',
	'footer'						=> 'Bryant School District © 2015 - 2016',
	'separator'						=> ':',
	'version'						=> '1.0.0',


/*
|--------------------------------------------------------------------------
| Image Paths
|--------------------------------------------------------------------------
*/
	'image' => [
// 		'logo_save'						=> storage_path('app/images/logos/'),
//		'user_save'						=> storage_path('app/images/users/'),
		'logo_save'						=> public_path('images/logos/'),
		'user_save'						=> public_path('images/users/'),
		'logo_show'						=> 'images/logos/',
// 		'user_show'						=> public_path('images/users/'),
		'resize_width'					=> '220',
		'resize_height'					=> '350',
	],


/*
|--------------------------------------------------------------------------
| Image Settings
|--------------------------------------------------------------------------
*/
	'templates' => array(
		'small' => function($image) {
			return $image->fit(120, 90);
		},
		'medium' => function($image) {
			return $image->fit(240, 180);
		},
		'large' => function($image) {
			return $image->fit(480, 360);
		}
	),


/*
|--------------------------------------------------------------------------
| Package settings
|--------------------------------------------------------------------------
*/
	'require_login'						=> false,

/*
|--------------------------------------------------------------------------
| routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Core views and standard package views
|--------------------------------------------------------------------------
*/

];
