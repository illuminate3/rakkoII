<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Menus\Http\Models\Menu as LMenu;
use App\Modules\Menus\Http\Models\Menulink;

use App;
use Cache;
use Config;
use Menu;
use Session;
use Theme;


class MenuDistrict extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();
		$district = Cache::get('district', null);
//dd($district);

		if ($district == null) {
			$district = Cache::rememberForever('district', function() {
				$main_menu_id = LMenu::where('name', '=', 'district')->pluck('id');
				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			});
		}


		if (count($district)) {
		Menu::handler('district')->hydrate(function()
			{

// 			$main_menu_id = LMenu::where('name', '=', 'district')->pluck('id');
// 			$district = Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			$district = Cache::get('district');
//dd($district);
			return $district;

			},
			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

			return Theme::View($activeTheme . '::' . 'widgets.school_menu');
		}
	}


}
