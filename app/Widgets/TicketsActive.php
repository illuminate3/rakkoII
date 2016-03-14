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

class TicketsActive extends Widget
{


	public function handle()
	{
		$count = $this->coountAllTickets();
		return $count;
	}


	public function coountAllTickets()
	{

		$count = trans('kotoba::general.error.no_data');

//Cache::forget('ticket_count_active_tickets');
		if (Cache::has('ticket_count_active_tickets')) {
			$count = Cache::get('ticket_count_active_tickets');
//dd($count);
		} else {
//dd('die');
			$count = $this->getActiveTickets();
			Cache::forever('ticket_count_active_tickets', $count);
		}

		return $count;

	}


	public function getActiveTickets()
	{

		if (Schema::hasTable('tickets')) {
			$count = 0;
			$total_tickets_active = Ticket::IsActive()->get();
			$count = count($total_tickets_active);
			if ( $count == null ) {
				$count = 0;
			}
			return $count;
		}
//return 'need to fix';

	}


}
