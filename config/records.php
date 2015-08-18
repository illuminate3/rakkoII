<?php

return [

//vendor:publish --provider="App\Modules\Records\Providers\RecordsServiceProvider" --tag="config"
//vendor:publish --provider="App\Modules\Records\Providers\RecordsServiceProvider" --tag="js"
//vendor:publish --provider="App\Modules\Records\Providers\RecordsServiceProvider" --tag="plugins"
//vendor:publish --provider="App\Modules\Records\Providers\RecordsServiceProvider" --tag="views"

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'records_db' => array(
	'prefix'					=> '',
),


'supported_document_types' => array(
// generic
	'txt' => 'text/plain',
// adobe
	'pdf' => 'application/pdf',
	'psd' => 'image/vnd.adobe.photoshop',
	'ai' => 'application/postscript',
	'eps' => 'application/postscript',
	'ps' => 'application/postscript',
// ms office
	'doc' => 'application/msword',
	'rtf' => 'application/rtf',
	'xls' => 'application/vnd.ms-excel',
	'ppt' => 'application/vnd.ms-powerpoint',
// open office
	'odt' => 'application/vnd.oasis.opendocument.text',
	'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
	'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',

),

'supported_image_types' => array(
	// images
	'png' => 'image/png',
	'jpe' => 'image/jpeg',
	'jpeg' => 'image/jpeg',
	'jpg' => 'image/jpeg',
	'gif' => 'image/gif',
	'bmp' => 'image/bmp',
	'ico' => 'image/vnd.microsoft.icon',
	'tiff' => 'image/tiff',
	'tif' => 'image/tiff',
	'svg' => 'image/svg+xml',
	'svgz' => 'image/svg+xml'
)


];
