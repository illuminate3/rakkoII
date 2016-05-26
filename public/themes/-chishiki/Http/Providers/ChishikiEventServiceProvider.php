<?php

namespace App\Modules\Chishiki\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Providers\EventServiceProvider;

use App\Modules\Chishiki\Events\AssetWasCreated;
use App\Modules\Chishiki\Handlers\Events\CreateAsset;
use App\Modules\Chishiki\Events\AssetWasUpdated;
use App\Modules\Chishiki\Handlers\Events\UpdateAsset;

use App\Modules\Chishiki\Http\Models\Asset;
use App\Modules\Ticket\Http\Models\Ticket;

use App;
use Event;


class AssetEventServiceProvider extends EventServiceProvider {


	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [

		AssetWasCreated::class => [
			CreateAsset::class,
		],

		AssetWasUpdated::class => [
			UpdateAsset::class,
		],

	];


	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		Asset::created(function ($asset) {
//dd($asset);
			\Event::fire(new AssetWasCreated($asset));
		});


		Asset::updated(function ($asset) {
//dd($asset);
			\Event::fire(new AssetWasUpdated($asset));
		});


	}

	public function register()
	{

		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('AssetWasCreated', 'App\Modules\Chishiki\Events\AssetWasCreated');

		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('AssetWasUpdated', 'App\Modules\Chishiki\Events\AssetWasUpdated');

	}


}
