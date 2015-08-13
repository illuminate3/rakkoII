<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\newsDesk\Http\Models\News as news;

use App;
use Config;
use Menu;
use Session;
use Theme;


class TopNews extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

		Menu::handler('TopNews')->hydrate(function()
			{

			$articles = News::IsPublished()->IsFeatured()->orderBy('order')->get();
			return $articles;

			},
			function($children, $item)
			{
				if($item->depth < 1) {
					$children->add($item->slug, $item->translate(Config::get('app.locale'))->title, Menu::items($item->as));
				}
			});

		return Theme::View($activeTheme . '::' . 'widgets.top_news');
	}


}
