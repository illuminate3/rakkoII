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


class MenuAssets extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();
//
// 		Menu::handler('assets')->hydrate(function()
// 			{
// //
// 			$main_menu_id = LMenu::where('name', '=', 'assets')->pluck('id');
// //dd($main_menu_id);
//
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
// //
// 			},
//
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.admin.assets_menu');
// 	}


Cache::forget('widget_assets');
		$menus = Cache::get('widget_assets', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_assets', function() {
				$main_menu_id = LMenu::where('name', '=', 'assets')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_assets')->hydrate(function()
			{
			$menus = Cache::get('widget_assets');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.admin.assets_menu');
		}


	}
}
