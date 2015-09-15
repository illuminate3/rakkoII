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
//		Cache::forget('theme');
//dd(env('ACTIVE_THEME', 'bootstrap'));
//dd($theme);

		if ($theme == null) {
			$theme = Setting::get( 'active_theme', Config::get('themes.active', 'bootstrap') );

			Theme::setActive($theme);
			Cache::forever('theme', $theme);
		}
//dd(Theme::getActive());
//dd(Theme::setActive($theme));
//dd(Theme::getActive() . '::' . Config::get('themes.simple', Theme::getActive() . '::' . '_layouts.simple'));
//dd($theme);

		View::share('activeTheme', $theme);
		View::share('theme_back', $theme . '::' . Config::get('themes.back', $theme . '::' . '_layouts.back'));
		View::share('theme_front',  $theme . '::' . Config::get('themes.front', $theme . '::' . '_layouts.app'));
		View::share('theme_simple', $theme . '::' . Config::get('themes.simple', $theme . '::' . '_layouts.simple'));

		return $next($request);

	}

}
