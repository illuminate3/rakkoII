<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Newsdesk\Http\Models\News as news;

use Session;
use Theme;


class Alert extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

		$lang = Session::get('locale');

		$timed_alerts = News::IsPublished()->SiteID()->IsAlert()->IsTimed()->orderBy('order')->get();
		$normal_alerts = News::IsPublished()->SiteID()->IsAlert()->NotTimed()->orderBy('order')->get();
		$alerts = $timed_alerts->merge($normal_alerts);
//dd($alerts);

		return Theme::View($activeTheme . '::' . 'widgets.alert',
			compact(
				'alerts',
				'lang'
			));

	}


}
