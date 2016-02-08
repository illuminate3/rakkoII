<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;


class Kernel extends HttpKernel
{

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
		\App\Http\Middleware\EncryptCookies::class,
		\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
		\Illuminate\Session\Middleware\StartSession::class,
		\Illuminate\View\Middleware\ShareErrorsFromSession::class,
		\App\Http\Middleware\VerifyCsrfToken::class,
		\GeneaLabs\LaravelCaffeine\Http\Middleware\LaravelCaffeineDripMiddleware::class,
		\App\Http\Middleware\SetLanguage::class,
		\App\Http\Middleware\Tenant::class,
		\App\Http\Middleware\SetTheme::class,
		\anlutro\LaravelSettings\SaveMiddleware::class,
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'module' => \Caffeinated\Modules\Middleware\IdentifyModule::class,
// auth middleware
		'auth'				=> \App\Http\Middleware\Authenticate::class,
		'auth.basic'		=> \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'guest'				=> \App\Http\Middleware\RedirectIfAuthenticated::class,
// module middleware
		'tenant'			=> \App\Http\Middleware\Tenant::class,
		'admin'				=> \App\Modules\Kagi\Http\Middleware\AuthenticateAdmin::class,
		'filex'				=> \App\Modules\Filex\Http\Middleware\AuthenticateFilex::class,
		'himawari'			=> \App\Modules\Himawari\Http\Middleware\AuthenticateHimawari::class,
		'newsdesk'			=> \App\Modules\Newsdesk\Http\Middleware\AuthenticateNewsdesk::class,
	];

}
