<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content as Content;

use App;
use Cache;
use Config;
use Menu;
use Session;
use Theme;


class AccessNavPoints extends Widget
{

	public function handle()
	{

dd('AccessNavPoints');

		$activeTheme = Theme::getActive();
//Cache::forget('accessnavpoint');
		$pages = Cache::get('widget_accessnavpoint', null);
//dd($pages);

		if ($pages == null) {
			$pages = Cache::rememberForever('widget_accessnavpoint', function() {
//				return Content::InPrint()->IsAccessPoint()->orderBy('order')->get();
				return Content::InPrint()->IsAccessPoint()->SiteID()->orderBy('order')->get();
			});
		}

//dd($pages);

		if (count($pages)) {
		Menu::handler('widget_accessnavpoint')->hydrate(function()
			{

			$pages = Cache::get('widget_accessnavpoint');
//dd($pages);
			return $pages;

			},
			function($children, $item)
			{
//dd($item);
				if($item->depth < 1) {
					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
				}

			});

			return Theme::View($activeTheme . '::' . 'widgets.accessnavpoints');
		}


	}
}
