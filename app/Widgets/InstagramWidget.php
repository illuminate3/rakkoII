<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use Config;
use Setting;
use Theme;
use Instagram;


class InstagramWidget extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();

		$response = Instagram::connection('main')->users()->getMedia('self');
		//dd($response);
		$instagrams =  json_encode($response->get());

		return Theme::View($activeTheme . '::' . 'widgets.instagram',
			compact(
				'instagrams'
		));

	}


}
