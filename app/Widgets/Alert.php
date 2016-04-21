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
use TenantScope;


class alert extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$lang = Session::get('locale');

/*
		Cache::forget('widget_alert');
		$articles = Cache::get('widget_alert', null);
		if ($articles == null) {
			$articles = Cache::rememberForever('widget_alert', function() {
				return News::IsPublished()->IsAlert()->orderBy('order')->get();
			});
		}
*/
//		$alerts = News::IsPublished()->IsAlert()->orderBy('order')->get();
//		$alerts = News::IsPublished()->IsAlert()->SiteID()->orderBy('order')->get();
//dd($alerts);

		$timed_alerts = News::IsPublished()->SiteID()->IsAlert()->IsTimed()->orderBy('order')->get();
//dd($timed_alerts);
		$normal_alerts = News::IsPublished()->SiteID()->IsAlert()->NotTimed()->orderBy('order')->get();
//dd($normal_alerts);
		$alerts = $timed_alerts->merge($normal_alerts);
//dd($alerts);

		return Theme::View($activeTheme . '::' . 'widgets.alert',
			compact(
				'alerts',
				'lang'
			));


	}
}
