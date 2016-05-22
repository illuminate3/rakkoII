<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Newsdesk\Http\Models\News as news;

use App;
use Cache;
use Config;
use Menu;
use Session;
use Theme;


class NewsBanner extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$lang = Session::get('locale');


//		Cache::forget('widget_news_banner');
//		$articles = Cache::get('widget_news_banner', null);
//		$articles = News::IsPublished()->IsBanner()->orderBy('order')->get();
//		$count = count($articles);
//dd($count);
/*
		if ( $count == 0 ) {
//dd($count);
// 			$articles = Cache::rememberForever('widget_news_banner', function() {
// 				return News::IsPublished()->IsBanner()->orderBy('order')->get();
// 			});
			$articles = News::IsPublished()->IsBanner()->orderBy('order')->get();
			Cache::forever('widget_news_banner', $articles);
		}
*/
//		$articles = News::IsPublished()->IsBanner()->orderBy('order')->get();
		$timed_articles = News::IsPublished()->SiteID()->IsBanner()->IsTimed()->orderBy('order')->get();
//dd($timed_articles);
		$normal_articles = News::IsPublished()->SiteID()->IsBanner()->NotTimed()->orderBy('order')->get();
//dd($normal_articles);
		$articles = $timed_articles->merge($normal_articles);
//dd($articles);

		$count = count($articles);
//dd($articles);

		return Theme::View($activeTheme . '::' . 'widgets.news_banner',
			compact(
				'articles',
				'count',
				'lang'
			));


	}
}
