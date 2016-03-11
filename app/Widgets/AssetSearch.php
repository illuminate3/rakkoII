<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

// use App\Modules\Himawari\Http\Models\Content as Content;

// use App;
// use Cache;
// use Config;
// use Menu;
// use Session;
use Theme;


class AssetSearch extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		return Theme::View($activeTheme . '::' . 'widgets.asset_search');


	}
}
