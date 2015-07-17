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

//		if ( Module::exists('himawari') ) {
/*
		Menu::handler('top')->hydrate( function()
			{
//				$pages = Content::where('print_status_id', '=', 3)->orderBy('order')->get();
			$pages = Content::whereRaw('print_status_id = 3 OR print_status_id = 4')->orderBy('order')->get();
//dd($pages);
			return $pages;
			},
			function($children, $item)
			{
//dd($item);
				if($item->depth < 1) {
					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
				}
			});
*/

		Menu::handler('top')->hydrate(function()
			{
// 			$main_menu_id = LMenu::where('name', '=', 'footer')->pluck('id');
// 			return MenuLink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();

			$pages = Content::all();
//			$pages = Content::whereRaw('print_status_id = 3 OR print_status_id = 4')->orderBy('order')->get();
//dd($pages);
			return $pages;

			},
			function($children, $item)
			{
//				if($item->depth < 1) {
					$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
//				}
			});


		return Theme::View($activeTheme . '::' . 'widgets.navigation_menu');

	}


}
