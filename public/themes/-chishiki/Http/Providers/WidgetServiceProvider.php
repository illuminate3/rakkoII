<?php

namespace App\Modules\Chishiki\Providers;

use Widget;
use Illuminate\Support\ServiceProvider;

//use Caffeinated\Modules\Facades\Module;


class WidgetServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}


	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{

// Individually
//		Widget::register('MenuAssets', 'App\Widgets\Admin\MenuAssets');
//		Widget::register('AllAssets', 'App\Modules\Chishiki\Http\Widgets\AllAssets');
//		Widget::register('AllAssets', 'App\Widgets\Chishiki\AllAssets');
		Widget::register('AllAssets', 'App\Widgets\AllAssets');
		Widget::register('AllAssets', 'App\Widgets\AllYearAssets');

	}

}
