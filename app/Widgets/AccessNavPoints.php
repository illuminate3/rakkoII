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


class AccessNavPoints extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();
		$accesspoint = Cache::get('accesspoint', null);
//dd($accesspoint);

		if ($accesspoint == null) {
			$accesspoint = Cache::rememberForever('accesspoint', function() {
				$main_menu_id = LMenu::where('name', '=', 'accesspoint')->pluck('id');
				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			});
		}


		if (count($accesspoint)) {
		Menu::handler('accessnavpoint')->hydrate(function()
			{

// 			$main_menu_id = LMenu::where('name', '=', 'accesspoint')->pluck('id');
// 			$accesspoint = Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			$accesspoint = Cache::get('accesspoint');
//dd($accesspoint);
			return $accesspoint;

			},
			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

			return Theme::View($activeTheme . '::' . 'widgets.accessnavpoints');
		}
	}


}
