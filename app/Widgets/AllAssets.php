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
		$count = $this->coountAllAssets();
		return $count;
	}


	public function coountAllAssets()
	{

		$count = trans('kotoba::general.error.no_data');

		if (Cache::has('shisan_count_all_assets')) {
			$count = Cache::get('shisan_count_all_assets');
//dd($count);
		} else {
//dd('die');
			$count = count($this->getAllAssets());
			Cache::forever('shisan_count_all_assets', $count);
		}

		return $count;

	}


	public function getAllAssets()
	{

		if (Cache::has('shisan_all_assets')) {
			$all_assets = Cache::get('shisan_all_assets');
		} else {
			$all_assets = Cache::rememberForever('shisan_all_assets', function() {
				return Asset::all();
			});
		}

		return $all_assets;

	}


}
