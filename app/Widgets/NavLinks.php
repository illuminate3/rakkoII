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

/*
//Cache::forget('pages');
		$pages = Cache::get('widget_navlinks', null);
//dd($pages);

//		if ($pages == null || isEmpty($pages) ) {
		if (!count($pages)) {
			$pages = Cache::rememberForever('widget_navlinks', function() {
//				return Content::InPrint()->IsNavigation()->orderBy('order')->get();
				return Content::InPrint()->IsNavigation()->SiteID()->orderBy('order')->get();
			});
		}
*/

//		$pages = Content::InPrint()->IsNavigation()->SiteID()->orderBy('order')->get();

//		$timed_pages = Content::InPrint()->SiteID()->IsNavigation()->IsTimed()->orderBy('order')->get();
//dd($timed_pages);
//		$normal_pages = Content::InPrint()->SiteID()->IsNavigation()->NotTimed()->orderBy('order')->get();
//dd($normal_pages);
//		$pages = $timed_pages->merge($normal_pages);

		$pages = Cache::rememberForever('widget_navlinks', function() {
			$timed_pages = Content::InPrint()->SiteID()->IsNavigation()->IsTimed()->orderBy('order')->get();
			$normal_pages = Content::InPrint()->SiteID()->IsNavigation()->NotTimed()->orderBy('order')->get();
			return $timed_pages->merge($normal_pages);
		});

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
