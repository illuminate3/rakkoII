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


		$articles = Cache::get('news_banner', null);

		if ($articles == null) {
			$articles = Cache::rememberForever('news_banner', function() {
				return News::IsPublished()->IsBanner()->orderBy('order')->get();
			});
		}

// 		$articles = News::IsPublished()->IsBanner()->orderBy('order')->get();
// 		$count = count($articles);
//dd($count);

		$count = count($articles);

		return Theme::View($activeTheme . '::' . 'widgets.news_banner',
			compact(
				'articles',
				'count',
				'lang'
			));
	}


}
