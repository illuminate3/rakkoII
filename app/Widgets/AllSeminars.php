<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Kenshu\Http\Models\Seminar;

use Cache;


class AllSeminars extends Widget
{


	public function handle()
	{
		$count = $this->coountAllSeminars();
		return $count;
	}


	public function coountAllSeminars()
	{

		$count = trans('kotoba::general.error.no_data');

		if (Cache::has('kenshu_count_all_seminars')) {
			$count = Cache::get('kenshu_count_all_seminars');
		} else {
			$count = count($this->getAllSeminars());
			Cache::forever('kenshu_count_all_seminars', $count);
		}

		return $count;
	}


	public function getAllSeminars()
	{

		if (Cache::has('kenshu_all_seminars')) {
			$all_seminars = Cache::get('kenshu_all_seminars');
		} else {
			$all_seminars = Cache::rememberForever('kenshu_all_seminars', function() {
				return Seminar::all();
			});
		}

		return $all_seminars;
	}


}
