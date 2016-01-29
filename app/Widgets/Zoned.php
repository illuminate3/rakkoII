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


class Zoned extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

// 		Menu::handler('zoned')->hydrate(function()
// 			{
//
// 			$pages = Content::InPrint()->IsZoned()->PublishStart()->PublishEnd()->orderBy('order')->get();
// 			return $pages;
//
// 			},
// 			function($children, $item)
// 			{
// 				if($item->depth < 1) {
// 					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
// 				}
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.zoned');
// 	}


		$menus = Cache::get('widget_zoned', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_zoned', function() {
				$main_menu_id = LMenu::where('name', '=', 'zoned')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->IsZone()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_zoned')->hydrate(function()
			{
			$menus = Cache::get('widget_zoned');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.zoned');
		}


	}
}
