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
		$pages = Cache::get('accesspoints', null);
//dd($pages);

		if ($pages == null) {
			$pages = Cache::rememberForever('accesspoints', function() {
				return Content::InPrint()->IsAccessPoint()->orderBy('order')->get();
			});
		}


		if (count($pages)) {
		Menu::handler('accesspoint')->hydrate(function()
			{

//			$pages = Content::IsAccessPoint()->orderBy('order')->get();
			$pages = Cache::get('accesspoints');
//dd($pages);
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
