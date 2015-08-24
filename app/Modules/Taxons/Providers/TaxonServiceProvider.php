<?php

namespace App\Modules\Core\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

use App;
use Config;
use Lang;
use Theme;
use View;


class CoreServiceProvider extends ServiceProvider
{

	/**
	 * Register the Core module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
//		App::register('App\Modules\Core\Providers\RouteServiceProvider');

		$this->registerNamespaces();
		$this->registerProviders();
	}


	/**
	 * Register the Core module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		View::addNamespace('core', realpath(__DIR__.'/../Resources/Views'));
	}


	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{

		$this->publishes([
			__DIR__.'/../Config/core.php' => config_path('core.php'),
			__DIR__.'/../Config/translator.php' => config_path('translator.php'),
			__DIR__ . '/../Resources/Assets/Images' => base_path('public/assets/images/'),
			__DIR__ . '/../Resources/Views/' => public_path('themes/') . Theme::getActive() . '/views/modules/core/',
		]);

		$this->publishes([
			__DIR__.'/../Config/core.php' => config_path('core.php'),
			__DIR__.'/../Config/translator.php' => config_path('translator.php'),
		], 'configs');

		$this->publishes([
			__DIR__ . '/../Resources/Assets/Images' => base_path('public/assets/images/'),
		], 'images');

		$this->publishes([
			__DIR__ . '/../Resources/Views/' => public_path('themes/') . Theme::getActive() . '/views/modules/core/',
		], 'views');

		AliasLoader::getInstance()->alias(
			'Setting',
			'anlutro\LaravelSettings\Facade'
		);

	}


	/**
	* add Prvoiders
	*
	* @return void
	*/
	private function registerProviders()
	{
		$app = $this->app;

		$app->register('App\Modules\Core\Providers\RouteServiceProvider');
		$app->register('App\Modules\Core\Providers\ViewComposerServiceProvider');
		$app->register('anlutro\LaravelSettings\ServiceProvider');
	}

}
