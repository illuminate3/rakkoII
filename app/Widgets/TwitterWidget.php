<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use Config;
use Setting;
use Theme;
use Twitter;


class TwitterWidget extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

		$screen_name = Setting::get('twitter_username', Config::get('social.username'));

		$tweets = Twitter::getUserTimeline([
			'screen_name' => $screen_name,
			'count' => 1,
			false,
			true
			]);
//dd($tweets);

		return Theme::View($activeTheme . '::' . 'widgets.twitter',
			compact(
				'screen_name',
				'tweets'
		));

	}


}
