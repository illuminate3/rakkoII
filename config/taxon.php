<?php

// php artisan vendor:publish --provider="App\Modules\Taxon\Providers\TaxonServiceProvider" --tag="configs"
// php artisan vendor:publish --provider="App\Modules\Taxon\Providers\TaxonServiceProvider" --tag="images"
// php artisan vendor:publish --provider="App\Modules\Taxon\Providers\TaxonServiceProvider" --tag="views"

return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'taxon_db' => array(
	'prefix'					=> '',
),

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'customer_catalog_type'			=> 1,
'production_catalog_type'		=> 2,
'vendor_catalog_type'			=> 3,

];
