<?php

namespace App\Modules\Chishiki\Providers;

use Illuminate\Support\ServiceProvider;

use App\Modules\Chishiki\Http\Models\Asset;

use DB;
use Cache;
use Schema;
use View;


class ViewComposerServiceProvider extends ServiceProvider
{


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
// 		$total_assets = $this->getAllAssets();
// 		View::share('total_assets', $total_assets);

// 		$total_assets_year = $this->getIsYearCreated();
// 		View::share('total_assets_year', $total_assets_year);
	}


	public function register()
	{
		//
	}


	public function getAllAssets()
	{

		if (Schema::hasTable('assets')) {
			$count = 0;
			$count = count(Asset::all());
			if ( $count == null ) {
				$count = 0;
			}
			return $count;
		}

	}


	public function getIsYearCreated()
	{
//		dd('die');

		if (Schema::hasTable('assets')) {
			$total_assets_year = Asset::IsYearCreated()->get();
			$count = count($total_assets_year);
			if ( $count == null ) {
				$count = 0;
			}
			return $count;
		}

//return 'need to fix';

	}


}
