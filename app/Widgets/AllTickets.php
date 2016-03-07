<?php

//namespace App\Modules\Shisan\Http\Widgets;
//namespace App\Widgets\Shisan;
namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Ticket\Http\Models\Ticket;

// use App;
use Cache;
// use Config;
// use Menu;
// use Session;
// use Theme;
use Schema;

class AllTickets extends Widget
{


	public function handle()
	{
		$count = $this->coountAllTickets();
		return $count;
	}


	public function coountAllTickets()
	{

		$count = trans('kotoba::general.error.no_data');

		if (Cache::has('ticket_count_all_tickets')) {
			$count = Cache::get('ticket_count_all_tickets');
//dd($count);
		} else {
//dd('die');
			$count = count($this->getAllTickets());
			Cache::forever('ticket_count_all_tickets', $count);
		}

		return $count;

	}


	public function getAllTickets()
	{

		if (Cache::has('ticket_all_tickets')) {
			$all_tickets = Cache::get('ticket_all_tickets');
		} else {
			$all_tickets = Cache::rememberForever('ticket_all_tickets', function() {
				return Ticket::all();
			});
		}

		return $all_tickets;

	}


}
