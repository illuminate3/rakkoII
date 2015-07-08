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

		$theme = Cache::get('theme');

		if ($theme == null) {
			$theme = Config::get('themes.active', 'bootstrap');
		}

		\Theme::setActive($theme);

		View::share('theme_front',  Theme::getActive() . '::' . Config::get('themes.front', Theme::getActive() . '::' . '_layouts.app'));
		View::share('theme_back', Theme::getActive() . '::' . Config::get('themes.back', Theme::getActive() . '::' . '_layouts.back'));
		View::share('activeTheme', Theme::getActive());

		return $next($request);

	}


}
