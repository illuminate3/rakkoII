<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Newsdesk\Http\Models\News as news;

//use Illuminate\Support\Collection;

//use CMenu;
use Session;
use Theme;


class NewsBanner extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$lang = Session::get('locale');

		$timed_articles = News::IsPublished()->SiteID()->IsBanner()->IsTimed()->orderBy('order')->get();
		$normal_articles = News::IsPublished()->SiteID()->IsBanner()->NotTimed()->orderBy('order')->get();
		$articles = $normal_articles->merge($timed_articles);

//		$articles = News::IsPublished()->SiteID()->IsBanner()->IsTimed()->NotTimed()->orderBy('order')->get();
// 		$articles = new Collection($articles);

//dd($articles);

		$count = count($articles);

		return Theme::View($activeTheme . '::' . 'widgets.news_banner',
			compact(
				'articles',
				'count',
				'lang'
			));

	}


}
