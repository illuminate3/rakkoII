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

class AllAssets extends Widget
{


	public function handle()
	{
		$count = $this->countAllAssets();
//dd($count);
		return $count;
	}


	public function countAllAssets()
	{

		$count = trans('kotoba::general.error.no_data');

//Cache::forget('shisan_count_all_assets');
		if (Cache::has('shisan_count_all_assets')) {
			$count = Cache::get('shisan_count_all_assets');
//dd($count);
		} else {
//dd('die');
			$count = $this->getAllAssets();
			Cache::forever('shisan_count_all_assets', $count);
		}

		return $count;

	}


	public function getAllAssets()
	{

/*
		if (Cache::has('shisan_all_assets')) {
			$all_assets = Cache::get('shisan_all_assets');
		} else {
			$all_assets = Cache::rememberForever('shisan_all_assets', function() {
				return Asset::all();
			});
		}

		return $all_assets;
*/


		if (Schema::hasTable('assets')) {
			$total_assets = Asset::all();
			$count = count($total_assets);
			if ( $count == null ) {
				$count = 0;
			}
//dd($count);
			return $count;
		}




	}


}
