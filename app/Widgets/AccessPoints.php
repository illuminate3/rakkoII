<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Himawari\Http\Models\Content as Content;

use App;
use Config;
use Menu;
use Session;
use Theme;


class AccessPoints extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

		Menu::handler('accesspoint')->hydrate(function()
			{
//dd('die');
			$pages = Content::IsAccessPoint()->orderBy('order')->get();
//			$pages = Content::where('print_status_id', '=', 3)->IsTimed()->PublishStart()->PublishEnd()->orderBy('order')->get();
//			$pages = Content::whereRaw('print_status_id = 3 OR print_status_id = 4')->IsTimed()->PublishStart()->PublishEnd()->orderBy('order')->get();
//dd($pages);
			return $pages;
			},
			function($children, $item)
			{
				if($item->depth < 1) {
					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
				}
			});

		return Theme::View($activeTheme . '::' . 'widgets.accesspoints');
	}


}
