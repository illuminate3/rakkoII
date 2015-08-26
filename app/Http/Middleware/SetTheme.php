<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Routing\Middleware;

use App;
use Closure;
use Cache;
use Config;
use Redirect;
use Setting;
use Theme;
use View;


class SetTheme implements Middleware {

	public function __construct(Application $app, Redirector $redirector, Request $request) {
		$this->app = $app;
		$this->redirector = $redirector;
		$this->request = $request;
	}

	public function handle($request, Closure $next)
	{

		$theme = Cache::get('theme', null);

		if ($theme == null) {
			$theme = Config::get('themes.active', 'bootstrap');
		}
//dd($theme);

		\Theme::setActive($theme);

		View::share( 'theme_front',  Setting::get('active_theme', Theme::getActive()) . '::' . Config::get('themes.front', Setting::get('active_theme', Theme::getActive()) . '::' . '_layouts.app') );
		View::share( 'theme_back', Setting::get('active_theme', Theme::getActive()) . '::' . Config::get('themes.back', Setting::get('active_theme', Theme::getActive()) . '::' . '_layouts.back') );
		View::share( 'activeTheme', Setting::get('active_theme', Theme::getActive()) );

		return $next($request);

	}

}
