<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Menus\Http\Models\Menu as LMenu;
use App\Modules\Menus\Http\Models\Menulink;

use App;
//use Cache;
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
		Menu::handler('assets')->hydrate(function()
			{
//
			$main_menu_id = LMenu::where('name', '=', 'assets')->pluck('id');
//			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
			},



// 		$activeTheme = Theme::getActive();
// Cache::forget('assets');
// 		$assets = Cache::get('assets', null);
// dd($assets);
//
// 		if ($assets == null) {
// 			$assets = Cache::rememberForever('assets', function() {
//
// 				$main_menu_id = LMenu::where('name', '=', 'assets')->pluck('id');
// 				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
// //				return Content::InPrint()->IsAccessPoint()->orderBy('order')->get();
// 			});
// 		}
//
// dd($assets);
//
// 		if (count($assets)) {
// 		Menu::handler('assets')->hydrate(function()
// 			{
//
// //			$pages = Content::IsAccessPoint()->orderBy('order')->get();
// 			$assets = Cache::get('assets');
// //dd($assets);
// 			return $assets;
//
// 			},




			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.admin.assets_menu');
	}


}
