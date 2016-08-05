<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use Cache;
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
		$tweet_minutes = Setting::get('tweet_minutes', Config::get('social.tweet_minutes'));
//dd($tweet_minutes);

		$tweets = Cache::get('widget_twitter', null);
		if ($tweets == null) {

			$tweets = Twitter::getUserTimeline([
				'screen_name' => $screen_name,
				'count' => 1,
				false,
				true
				]);

			Cache::put('widget_twitter', $tweets, $tweet_minutes);

// 			$tweets = Cache::remember('widget_twitter', $tweet_minutes, function() {
// 				Return $tweets;
// 			});
		}

//dd($tweets);

		return Theme::View($activeTheme . '::' . 'widgets.twitter',
			compact(
				'screen_name',
				'tweets'
		));

	}


}
/*

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
*/

