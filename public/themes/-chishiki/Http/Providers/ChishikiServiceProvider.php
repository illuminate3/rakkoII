<?php

namespace App\Modules\Chishiki\Providers;

//use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

use App;
use Config;
use Lang;
use Theme;
use View;


class ChishikiServiceProvider extends ServiceProvider
{


	/**
	 * Register the Chishiki module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
//		App::register('App\Modules\Chishiki\Providers\RouteServiceProvider');

		$this->registerNamespaces();
		$this->registerProviders();
	}


	/**
	 * Register the Chishiki module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		View::addNamespace('Chishiki', realpath(__DIR__.'/../Resources/Views'));
	}


	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{

		$this->publishes([
			__DIR__.'/../Config/chishiki.php' => config_path('chishiki.php'),
			__DIR__ . '/../Resources/Assets/Images' => base_path('public/assets/images/'),
			__DIR__ . '/../Resources/Views/' => public_path('themes/') . Theme::getActive() . '/views/modules/chishiki/',
		]);


		$this->publishes([
			__DIR__.'/../Config/chishiki.php' => config_path('Chishiki.php'),
		], 'configs');

		$this->publishes([
			__DIR__ . '/../Resources/Assets/Images' => base_path('public/assets/images/'),
		], 'images');

		$this->publishes([
			__DIR__ . '/../Resources/Views/' => public_path('themes/') . Theme::getActive() . '/views/modules/chishiki/',
		], 'views');

/*
        'phone'      => 'The :attribute field contains an invalid number.',
        'Bugsnag'    => 'Bugsnag\BugsnagLaravel\BugsnagFacade',
        'PDF'        => 'Vsmoraes\Pdf\PdfFacade',
        'Gravatar'   => 'Thomaswelton\LaravelGravatar\Facades\Gravatar',
        'UTC'        => 'App\Modules\Chishiki\Http\Controllers\Agent\helpdesk\TicketController',
        'Ttable'     => 'App\Modules\Chishiki\Http\Controllers\Agent\helpdesk\TicketController', //to use getTable function.
        'SMTPS'      => 'App\Modules\Chishiki\Http\Controllers\HomeController',
        'Datatable'  => 'Chumper\Datatable\Facades\DatatableFacade',
        'Zipper'     => 'Chumper\Zipper\Zipper',
        'Image'      => Intervention\Image\Facades\Image::class,
        'JWTAuth'    => 'Tymon\JWTAuth\Facades\JWTAuth',
        'JWTFactory' => 'Tymon\JWTAuth\Facades\JWTFactory',


        'Propaganistas\LaravelPhone\LaravelPhoneServiceProvider',
        'Bugsnag\BugsnagLaravel\BugsnagLaravelServiceProvider',
        'Vsmoraes\Pdf\PdfServiceProvider',
        'Thomaswelton\LaravelGravatar\LaravelGravatarServiceProvider',
        'Chumper\Datatable\DatatableServiceProvider',
        'Chumper\Zipper\ZipperServiceProvider',
        Bestmomo\Filemanager\FilemanagerServiceProvider::class,
        Unisharp\Laravelfilemanager\LaravelFilemanagerServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
        'Tymon\JWTAuth\Providers\JWTAuthServiceProvider',
*/



// 		AliasLoader::getInstance()->alias(
// 			'Setting',
// 			'anlutro\LaravelSettings\Facade'
// 		);

		$app = $this->app;

		$app->register('App\Modules\Chishiki\Providers\MacroServiceProvider');
//		$app->register('App\Modules\Chishiki\Providers\ViewComposerServiceProvider');
		$app->register('App\Modules\Chishiki\Providers\AssetEventServiceProvider');
		$app->register('App\Modules\Chishiki\Providers\WidgetServiceProvider');

// Register Middleware
		$kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
		$kernel->pushMiddleware('App\Modules\Chishiki\Http\Middleware\MenuChishikiMiddleware');

	}


	/**
	* add Prvoiders
	*
	* @return void
	*/
	private function registerProviders()
	{
		$app = $this->app;

		$app->register('App\Modules\Chishiki\Providers\RouteServiceProvider');

	}


}
