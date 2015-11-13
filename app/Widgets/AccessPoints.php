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
				return Content::InPrint()->IsAccessPoint()->orderBy('order')->get();
			});
		}
//dd($pages);

		$count = count($pages);
//dd($count);

		if (count($pages)) {
		Menu::handler('widget_accesspoints')->hydrate(function()
			{

//			$pages = Content::IsAccessPoint()->orderBy('order')->get();
			$pages = Cache::get('widget_accesspoints');
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

			return Theme::View($activeTheme . '::' . 'widgets.accesspoints');
		}


	}
}
