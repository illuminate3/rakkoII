<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Menus\Http\Models\Menu as LMenu;
use App\Modules\Menus\Http\Models\Menulink;

use App;
use Cache;
use Config;
//use DB;
use Menu;
use Session;
use Theme;


class MenuOffice extends Widget
{


	public function handle()
	{

dd('MenuOffice');

		$activeTheme = Theme::getActive();

// 		Menu::handler('office')->hydrate(function()
// 			{
//
// 			$main_menu_id = LMenu::where('name', '=', 'office')->pluck('id');
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
// 			},
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.menu_office');
// 	}



		$menus = Cache::get('widget_office', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_office', function() {
				$main_menu_id = LMenu::where('name', '=', 'office')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_office')->hydrate(function()
			{
			$menus = Cache::get('widget_office');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.menu_office');
		}


	}
}
