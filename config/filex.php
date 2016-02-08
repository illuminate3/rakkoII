<?php

return [

//vendor:publish --provider="App\Modules\Filex\Providers\FilexServiceProvider" --tag="config"
//vendor:publish --provider="App\Modules\Filex\Providers\FilexServiceProvider" --tag="js"
//vendor:publish --provider="App\Modules\Filex\Providers\FilexServiceProvider" --tag="plugins"
//vendor:publish --provider="App\Modules\Filex\Providers\FilexServiceProvider" --tag="views"

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'filex_db' => array(
	'prefix'					=> '',
),

'auth_fail_redirect'			=> '/admin/dashboard',


/*
width: A style that defines a width only (landscape). Height will be automagically selected to preserve aspect ratio. This works well for resizing images for display on mobile devices, etc.
xheight: A style that defines a heigh only (portrait). Width automagically selected to preserve aspect ratio.
widthxheight#: Resize then crop.
widthxheight!: Resize by exacty width and height. Width and height emphatically given, original aspect ratio will be ignored.
widthxheight: Auto determine both width and height when resizing. This will resize as close as possible to the given dimensions while still preserving the original aspect ratio.
*/

'image_styles' => [
	'landscape'					=> '1356x500!',
	'preview'					=> '700x500!',
	'portrait'					=> '150x196!',
	'news'						=> '100x100!',
	'thumb'						=> '100x100!'
],
//	'url' => '/system/files/:attachment/:id_partition/:style/:filename'
			'url' => '/system/files/:attachment/:id/:style/:filename',

];
