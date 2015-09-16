<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\newsDesk\Http\Models\News as news;

use App;
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

		$articles = News::IsPublished()->IsBanner()->orderBy('order')->get();
		$count = count($articles);
//dd($count);

		return Theme::View($activeTheme . '::' . 'widgets.news_banner',
			compact(
				'articles',
				'count',
				'lang'
			));
	}


}
