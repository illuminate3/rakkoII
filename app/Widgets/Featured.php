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


class Featured extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

// 		Menu::handler('featured')->hydrate(function()
// 			{
//
// 			$pages = Content::InPrint()->IsFeatured()->orderBy('order')->get();
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
// 		return Theme::View($activeTheme . '::' . 'widgets.featured');
// 	}


		$menus = Cache::get('widget_featured', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_featured', function() {
				$main_menu_id = LMenu::where('name', '=', 'featured')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_featured')->hydrate(function()
			{
			$menus = Cache::get('widget_featured');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.featured');
		}


	}


}
