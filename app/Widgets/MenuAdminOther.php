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


class MenuAdminOther extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

		$menus = Cache::get('other', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('other', function() {
				$main_menu_id = LMenu::where('name', '=', 'other')->pluck('id');
				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('other')->hydrate(function()
			{
			$menus = Cache::get('other');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.admin.admin_other_menu');
		}
	}


}
