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


class MenuSchools extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();
		$schools = Cache::get('schools', null);
//Cache::forget('schools');
//dd($schools);

		if ($schools == null) {
			$schools = Cache::rememberForever('schools', function() {
				$main_menu_id = LMenu::where('name', '=', 'schools')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}


		if (count($schools)) {
		Menu::handler('schools')->hydrate(function()
			{

// 			$main_menu_id = LMenu::where('name', '=', 'schools')->pluck('id');
// 			$schools = Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			$schools = Cache::get('schools');
//dd($schools);
			return $schools;

			},
			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

			return Theme::View($activeTheme . '::' . 'widgets.school_menu');
		}
	}


}
