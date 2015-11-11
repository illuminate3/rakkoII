<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Seminar\Http\Models\Seminar;

use App;
use Cache;
use Config;
use Menu;
use Session;
use Theme;


class TopSeminars extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$lang = Session::get('locale');

		$seminars = Cache::get('widget_top_seminars', null);

		if ($seminars == null) {
			$seminars = Cache::rememberForever('widget_top_seminars', function() {
//				return Seminar::IsPublished()->IsFeatured()->LimitTop()->orderBy('order')->get();
				return Seminar::orderBy('order')->get();
			});
		}

// 		$seminars = News::IsPublished()->IsFeatured()->LimitTop()->orderBy('order')->get();
// dd($seminars);

		return Theme::View($activeTheme . '::' . 'widgets.top_seminars',
			compact(
				'seminars',
				'lang'
			));


	}
}
