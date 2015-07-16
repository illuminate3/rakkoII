<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

//use App\Modules\Himawari\Http\Domain\Models\Content as Content;

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

		if ( Module::exists('himawari') ) {
			Menu::handler('top')->hydrate(function()
				{
//				$pages = Content::where('print_status_id', '=', 3)->orderBy('order')->get();
				$pages = Content::whereRaw('print_status_id = 3 OR print_status_id = 4')->orderBy('order')->get();
//dd($pages);
				return $pages;
				},
				function($children, $item)
				{
					if($item->depth < 1) {
						$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
					}
				});

			return Theme::View($activeTheme . '::' . 'widgets.navigation_menu');
		}

	}


}
