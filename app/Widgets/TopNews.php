<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Newsdesk\Http\Models\News as news;

//use App;
//use Cache;
//use Config;
use Menu;
use Session;
use Theme;


class TopNews extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$lang = Session::get('locale');

// 		$timed_articles = News::IsPublished()->SiteID()->IsFeatured()->IsTimed()->LimitTop()->orderBy('order')->get();
// 		$normal_articles = News::IsPublished()->SiteID()->IsFeatured()->NotTimed()->LimitTop()->orderBy('order')->get();
// 		$articles = $timed_articles->merge($normal_articles);
//dd($articles);
		$articles = News::IsPublished()->SiteID()->IsFeatured()->LimitTop()->orderBy('order')->get();

		return Theme::View($activeTheme . '::' . 'widgets.top_news',
			compact(
				'articles',
				'lang'
			));

	}


}
