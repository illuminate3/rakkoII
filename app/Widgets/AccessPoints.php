<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content as Content;

use Cache;
use Menu;
use Theme;


class AccessPoints extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

//Cache::forget('widget_accesspoints');
		$pages = Cache::get('widget_accesspoints', null);
//dd($pages);

		if ($pages == null) {
			$pages = Cache::rememberForever('widget_accesspoints', function() {
				return Content::InPrint()->IsAccessPoint()->SiteID()->orderBy('order')->get();
			});
		}

		$count = count($pages);

		if (count($pages)) {

			Menu::handler('widget_accesspoints')->hydrate(function() {
				$pages = Cache::get('widget_accesspoints');
				return $pages;
				},
				function($children, $item)
				{
					if($item->depth < 1) {
						$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
					}
				});

			return Theme::View($activeTheme . '::' . 'widgets.accesspoints');
		}

	}


}
