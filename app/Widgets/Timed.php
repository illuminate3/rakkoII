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


class Timed extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

dd('Timed');

// 		Menu::handler('timed')->hydrate(function()
// 			{
//
// 			$pages = Content::InPrint()->IsTimed()->PublishStart()->PublishEnd()->orderBy('order')->get();
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
// 		return Theme::View($activeTheme . '::' . 'widgets.timed');
// 	}


		$menus = Cache::get('widget_timed', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_timed', function() {
				$main_menu_id = LMenu::where('name', '=', 'timed')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_timed')->hydrate(function()
			{
			$menus = Cache::get('widget_timed');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.timed');
		}


	}
}
