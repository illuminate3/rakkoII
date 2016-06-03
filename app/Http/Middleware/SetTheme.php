<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Contracts\Routing\Middleware;
use App\Http\Middleware\Tenant;

use App;
use Closure;
use Cache;
use Config;
use Redirect;
use Setting;
use Theme;
use View;


//class SetTheme implements Middleware {
class SetTheme
{


	public function __construct(
		Application $app,
		Tenant $tenant,
		Redirector $redirector,
		Request $request
	) {
		$this->app = $app;
		$this->redirector = $redirector;
		$this->request = $request;
		$this->tenant = $tenant;
//		$this->middleware('tenant');
	}

	public function handle($request, Closure $next)
	{
		$domain_slug = $this->tenant->getDomainSlug();
		$site_info = $this->tenant->getSiteInfo($domain_slug);
//$site_id = $this->tenant->getSiteID();
		$site_id = $site_info->id;
		$site_theme_slug = $this->tenant->getThemeSlug($site_id, $site_info);
//dd($site_theme_slug);


		Cache::forget('theme');
//dd($theme);
//		$theme = Cache::get('theme', null);
		$theme = Cache::get($site_id . '_' . 'theme', $site_theme_slug);
		$theme = explode('_', $theme);
		$theme = $theme[1];
//dd($theme);
			Theme::setActive($theme);
		if ($theme == null) {
dd('die');
			$theme = Setting::get( 'active_theme', Config::get('themes.active', 'bootstrap') );
			Theme::setActive($theme);
//			Cache::forever('theme', $theme);
		}

//dd(env('ACTIVE_THEME'));
//dd($theme);
//dd(Theme::getActive());
//dd(Theme::setActive($theme));
//dd(Theme::getActive() . '::' . Config::get('themes.front', $theme . '::' . '_layouts.front'));

		View::share('activeTheme', $theme);
//		View::share('theme_app',  $theme . '::' . Config::get('themes.app', $theme . '::' . '_layouts.app'));
		View::share('theme_back', $theme . '::' . Config::get('themes.back', $theme . '::' . '_layouts.back'));
		View::share('theme_front',  $theme . '::' . Config::get('themes.front', $theme . '::' . '_layouts.front'));
		View::share('theme_simple', $theme . '::' . Config::get('themes.simple', $theme . '::' . '_layouts.simple'));

		View::share('theme_manager', $theme . '::' . Config::get('themes.manager', $theme . '::' . '_layouts.manager'));
		View::share('theme_agent', $theme . '::' . Config::get('themes.agent', $theme . '::' . '_layouts.agent'));
		View::share('theme_client', $theme . '::' . Config::get('themes.client', $theme . '::' . '_layouts.client'));

//dd($theme_manager);
//		View::share('site_title', Setting::get( 'brand_title', Config::get('core.title', 'Site Name')) );


		return $next($request);

	}


}
