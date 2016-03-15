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


class MenuSettings extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

// 		Menu::handler('settings')->hydrate(function()
// 			{
//
// 			$main_menu_id = LMenu::where('name', '=', 'settings')->pluck('id');
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
// 			},
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.admin.settings_menu');
// 	}

//Cache::forget('widget_settings');
		$menus = Cache::get('widget_settings', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_settings', function() {
				$main_menu_id = LMenu::where('name', '=', 'settings')->pluck('id');
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
			Menu::handler('widget_settings')->hydrate(function()
			{
				$menus = Cache::get('widget_settings');
				return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

			return Theme::View($activeTheme . '::' . 'widgets.admin.settings_menu');
		}


	}
}
