<?php

//namespace App\Modules\Shisan\Http\Widgets;
//namespace App\Widgets\Shisan;
namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Shisan\Http\Models\Asset;

// use App;
use Cache;
// use Config;
// use Menu;
// use Session;
// use Theme;
use Schema;

class AllYearAssets extends Widget
{


	public function handle()
	{
		$count = $this->coountAllAssets();
		return $count;
	}


	public function coountAllAssets()
	{

		$count = trans('kotoba::general.error.no_data');

//Cache::forget('shisan_count_all_year_assets');
		if (Cache::has('shisan_count_all_year_assets')) {
			$count = Cache::get('shisan_count_all_year_assets');
//dd($count);
		} else {
//dd('die');
			$count = $this->getIsYearCreated();
			Cache::forever('shisan_count_all_year_assets', $count);
		}
//dd($count);

		return $count;

	}


	public function getIsYearCreated()
	{
//		dd('die');

		if (Schema::hasTable('assets')) {
			$total_assets_year = Asset::IsYearCreated()->get();
			$count = count($total_assets_year);
			if ( $count == null ) {
				$count = 0;
			}
//dd($count);
			return $count;
		}

//return 'need to fix';

	}


}
