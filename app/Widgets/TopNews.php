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
		$lang = Session::get('locale');

		$articles = News::IsPublished()->IsFeatured()->LimitTop()->orderBy('order')->get();
//dd($activeTheme);

		return Theme::View($activeTheme . '::' . 'widgets.top_news',
			compact(
				'articles',
				'lang'
			));
	}


}
