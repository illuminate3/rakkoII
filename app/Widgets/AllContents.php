<?php

//namespace App\Modules\Shisan\Http\Widgets;
//namespace App\Widgets\Shisan;
namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content;

// use App;
use Cache;
// use Config;
// use Menu;
// use Session;
// use Theme;
use Schema;

class AllContents extends Widget
{


	public function handle()
	{
		$count = $this->coountAllContents();
		return $count;
	}


	public function coountAllContents()
	{

		$count = trans('kotoba::general.error.no_data');

		if (Cache::has('himawari_count_all_contents')) {
			$count = Cache::get('himawari_count_all_contents');
//dd($count);
		} else {
//dd('die');
			$count = count($this->getAllContents());
			Cache::forever('himawari_count_all_contents', $count);
		}

		return $count;

	}


	public function getAllContents()
	{

		if (Cache::has('himawari_all_contents')) {
			$all_contents = Cache::get('himawari_all_contents');
		} else {
			$all_contents = Cache::rememberForever('himawari_all_contents', function() {
				return Content::all();
			});
		}

		return $all_contents;

	}


}
