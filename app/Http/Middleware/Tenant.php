<?php

namespace App\Http\Middleware;

use App\Modules\Core\Http\Models\Site;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use AuraIsHere\LaravelMultiTenant\TenantScope;

use Cache;
use Closure;
use Config;
use Session;
//use TenantScope;
use View;

class Tenant {

	protected $domain;
//	protected $all_sites;
	protected $site_info;
//	protected $tenant;
//private $all_sites;

	public function __construct(
		Site $site
	) {
		$this->site = $site;
	}


	public function handle($request, Closure $next)
	{

// $all_sites = Site::get();
// $this->$all_sites = $all_sites;
//$this->all_sites = Site::get();
//View::share('all_sites', $all_sites);
//		Cache::forget('all_sites');
// 		$all_sites = Cache::rememberForever('all_sites', function() {
// 			return Site::get();
// 		});
//dd($all_sites);
//dd($this->$all_sites);

		$domain_slug = $this->getDomainSlug();
		$site_info = $this->getSiteInfo($domain_slug);
		$site_id = $site_info->id;
//dd($site_id);


		return $next($request);
	}



	public function getDomainSlug()
	{
		$domain = $_SERVER['SERVER_NAME'];
		$slugs = explode('.', $domain);
		$domain_slug = $slugs[0];
//dd($domain_slug);

		return $domain_slug;
	}


	public function getSiteInfo($domain_slug)
	{
//dd(Config::get('laravel-multi-tenant.default_tenant_columns'));

		$site_info = Site::where('slug', $domain_slug)->first();
//		Cache::forget('sites');
// 		$site_info = Cache::rememberForever('sites', function() {
// 		return Site::where('slug', $domain_slug)->first();
// 		});
//\TenantScope::addTenant( Config::get('laravel-multi-tenant.default_tenant_columns'), session()->get('siteId') );
//\TenantScope::addTenant('site_id', '11');

		if (!$site_info) {
//			throw new NotFoundHttpException;
			$site_info = Site::where('id', Config::get('core_tenant.default_tenant_id'))->first();
		}
//dd($site_info);

//dd($site_info->id);
//		Session::set('siteId', $site_info->id);
//dd(session('siteId', $site_info->id));
//		session('siteId', $site_info->id);
		Session::put('siteId', $site_info->id);
		Cache::forget('siteId');
		Cache::forever('siteId', $site_info->id);
//dd(session()->get('siteId'));

		return $site_info;
	}

//	public function getThemeSlug()
	public function getThemeSlug($site_id, $site_info)
	{
//		Cache::forget($site_id . '_' . 'theme_slug');
		$theme_slug = Cache::get($site_id . '_' . 'theme_slug', null);
//dd($theme_slug);
		if ($theme_slug == null) {
			$theme_slug = $site_info->theme_slug;
			$theme_slug = $site_id . '_' . $theme_slug;
//dd($theme_slug);
			Cache::forever($site_id . '_' . 'theme_slug', $theme_slug);
		}
//dd($theme_slug);

		return $theme_slug;
	}


//	public function getSiteID()
	public function getSiteID($site_id)
	{
dd('die');
//		Cache::forget($site_id . '_' . 'site_id');
		$site_id = Cache::get($site_id . '_' . 'site_id', null);
		if ($site_id == null) {
//			$site_id = Setting::get( 'active_theme', Config::get('themes.active', 'bootstrap') );
			$site_id = $site_info->id;
			Cache::forever($site_id . '_' . 'site_id', $site_id);
		}

		return $site_id;
	}


//	public function getSiteSlug()
	public function getSiteSlug($site_id)
	{
dd('die');
//		Cache::forget($site_id . '_' . 'site_slug');
		$site_slug = Cache::get($site_id . '_' . 'site_slug', null);
		if ($site_slug == null) {
			$site_slug = $site_info->site_slug;
			Cache::forever($site_id . '_' . 'site_slug', $site_slug);
		}

		return $site_slug;
	}


}
