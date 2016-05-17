<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Choose which filesystem you wish to use to store the media
	|--------------------------------------------------------------------------
	| Choose one or more of the filesystems you configured
	| in app/config/filesystems.php
	| Supported: "local", "s3"
	*/
	'filesystem' => 'local',
	/*
	|--------------------------------------------------------------------------
	| The path where the media files will be uploaded
	|--------------------------------------------------------------------------
	| Note: Trailing slash is required
	*/
	'files-path' => '/system/media/',
	/*
	|--------------------------------------------------------------------------
	| Specify all the allowed file extensions a user can upload on the server
	|--------------------------------------------------------------------------
	*/
	'allowed-types' => '.jpg,.png',
	/*
	|--------------------------------------------------------------------------
	| Determine the max file size upload rate
	| Defined in MB
	|--------------------------------------------------------------------------
	*/
	'max-file-size' => '5',

	/*
	|--------------------------------------------------------------------------
	| Determine the max total media folder size
	|--------------------------------------------------------------------------
	| Expressed in bytes
	*/
	'max-total-size' => 1000000000,

// 'image_styles' => [
// 	'landscape'					=> '1356x500!',
// 	'preview'					=> '700x500!',
// 	'portrait'					=> '150x196!',
// 	'news'						=> '100x100!',
// 	'thumb'						=> '100x100!'
// ],


	'smallThumb' => [
		'resize' => [
			'width' => 50,
			'height' => null,
			'callback' => function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			},
		],
	],
	'mediumThumb' => [
		'resize' => [
			'width' => 180,
			'height' => null,
			'callback' => function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			},
		],
	],



];
