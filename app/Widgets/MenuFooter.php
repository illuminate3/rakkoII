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


class MenuFooter extends Widget
{


	public function handle()
	{

		$activeTheme				= Theme::getActive();

		Menu::handler('footer')->hydrate(function()
			{
			$main_menu_id = LMenu::where('name', '=', 'footer')->pluck('id');
			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			},
			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.footer_menu');
	}


}
