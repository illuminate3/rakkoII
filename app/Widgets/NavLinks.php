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
//Cache::forget('pages');
		$pages = Cache::get('widget_navlinks', null);
//dd($pages);

//		if ($pages == null || isEmpty($pages) ) {
		if (!count($pages)) {
			$pages = Cache::rememberForever('widget_navlinks', function() {
				return Content::InPrint()->IsNavigation()->orderBy('order')->get();
			});
		}
//dd($pages);


		if (count($pages)) {
		Menu::handler('widget_navlinks')->hydrate(function()
			{

// 			$pages = Content::IsNavigation()->orderBy('order')->get();
			$pages = Cache::get('widget_navlinks');
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
