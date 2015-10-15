<?php

// php artisan vendor:publish --provider="App\Modules\Ticket\Providers\TicketServiceProvider" --tag="configs"


return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'ticket_db' => array(
	'prefix'					=> '',
),

'ticket_update_slug'			=> 'ticket_update',
'tech_status_purchased'			=> 1,

];
