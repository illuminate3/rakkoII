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


class MenuAdmin extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

// 		Menu::handler('admin')->hydrate(function()
// 			{
//
// 			$main_menu_id = LMenu::where('name', '=', 'admin')->pluck('id');
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
// 			},
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.admin_menu');
// 	}



		$menus = Cache::get('widget_admin', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_admin', function() {
				$main_menu_id = LMenu::where('name', '=', 'admin')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_admin')->hydrate(function()
			{
			$menus = Cache::get('widget_admin');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.admin_menu');
		}


	}
}
