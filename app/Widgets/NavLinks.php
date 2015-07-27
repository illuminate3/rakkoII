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


class NavLinks extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$pages = Cache::get('pages');
//dd($pages);

		if ($pages == null) {
			$pages = Cache::rememberForever('pages', function() {
				return Content::IsNavigation()->orderBy('order')->get();
			});
		}


		if (count($pages)) {
		Menu::handler('navlinks')->hydrate(function()
			{

// 			$pages = Content::IsNavigation()->orderBy('order')->get();
			$pages = Cache::get('pages');
//dd($pages);
			return $pages;

			},
			function($children, $item)
			{
				if($item->depth < 1) {
					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
				}
			});

		return Theme::View($activeTheme . '::' . 'widgets.navlinks');
		}
	}


}
