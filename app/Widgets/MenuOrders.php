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


class MenuOrders extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

// 		Menu::handler('orders')->hydrate(function()
// 			{
//
// 			$main_menu_id = LMenu::where('name', '=', 'orders')->pluck('id');
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
// 			},
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.menu_orders');


		$menus = Cache::get('widget_orders', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_orders', function() {
				$main_menu_id = LMenu::where('name', '=', 'orders')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_orders')->hydrate(function()
			{
			$menus = Cache::get('widget_orders');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.menu_orders');
		}


	}
}
