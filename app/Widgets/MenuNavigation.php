<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content as Content;
use App\Modules\Menus\Http\Models\Menu as LMenu;
use App\Modules\Menus\Http\Models\Menulink;

use App;
use Cache;
use Config;
//use DB;
use Menu;
use Module;
use Session;
use Theme;


class MenuNavigation extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

// 		$pages = Content::InPrint()->orderBy('order')->get();
		$pages = Cache::get('top', null);

		if ($pages == null) {
			$pages = Cache::rememberForever('top', function() {
//				return Content::InPrint()->orderBy('order')->get();
				return Content::InPrint()->NotFeatured()->NotTimed()->orderBy('order')->get();
			});
		}




		if (count($pages)) {
		Menu::handler('top')->hydrate(function()
			{

//			$pages = Content::InPrint()->NotFeatured()->NotTimed()->orderBy('order')->get();
			$pages = Cache::get('top');
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
