<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content as Content;

use App;
use Config;
use Menu;
use Session;
use Theme;


class Featured extends Widget
{


	public function handle()
	{

		$activeTheme = Theme::getActive();

		Menu::handler('featured')->hydrate(function()
			{
//			$pages = Content::where('print_status_id', '=', 3)->IsFeatured()->orderBy('order')->get();
			$pages = Content::InPrint()->IsFeatured()->orderBy('order')->get();
//			$pages = Content::whereRaw('print_status_id = 3 OR print_status_id = 4')->IsFeatured()->orderBy('order')->get();
//dd($pages);
			return $pages;
			},
			function($children, $item)
			{
				if($item->depth < 1) {
					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
				}
			});

		return Theme::View($activeTheme . '::' . 'widgets.featured');
	}


}
