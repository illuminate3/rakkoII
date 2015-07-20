<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content as Content;
use App\Modules\Menus\Http\Models\Menu as LMenu;
use App\Modules\Menus\Http\Models\MenuLink;

use App;
//use Cache;
use Config;
use DB;
use Menu;
use Module;
use Session;
use Theme;


class MenuNavigation extends Widget
{


	public function handle()
	{

		$activeTheme				= Theme::getActive();

		$pages = Content::InPrint()->orderBy('order')->get();

if (count($pages)) {
		Menu::handler('top')->hydrate(function()
			{
//dd($pages);

//			$pages = Content::all();
//			$pages = Content::whereRaw('print_status_id = 3 OR print_status_id = 4')->orderBy('order')->get();
//			$pages = Content::whereRaw('print_status_id')->orderBy('order')->get();
			$pages = Content::InPrint()->NotFeatured()->NotTimed()->orderBy('order')->get();
//dd($pages);
			return $pages;

			},
			function($children, $item)
			{
//				if($item->depth > 0) {
					$children->add($item->slug, $item->translate(App::getLocale())->title, Menu::items($item->as));
//				}
			});


		return Theme::View($activeTheme . '::' . 'widgets.navigation_menu');

	}
}


}
