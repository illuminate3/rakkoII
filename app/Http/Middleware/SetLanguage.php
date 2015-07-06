<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Routing\Middleware;

use App;
use Closure;
use Config;
use Lang;
use Session;


class SetLanguage implements Middleware {

	public function __construct(Request $request)
	{
		$this->request = $request;
		$lang = Session::get('locale');
		if ($lang == null) {
			Session::set('locale', Config::get('app.locale'));
		}
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$lang = Session::get('locale');
		if ( $lang != App::getLocale() ) {
			if ( Session::has('locale') && array_key_exists(Session::get('locale'), Config::get('languages.supportedLocales')) ) {
				App::setLocale(Session::get('locale'));
			} else {
				App::setLocale(Config::get('app.fallback_locale'));
			}
		}

		return $next($request);

	}


}
