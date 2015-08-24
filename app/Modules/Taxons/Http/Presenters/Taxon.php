<?php

namespace App\Modules\Core\Http\Presenters;

use Laracasts\Presenter\Presenter;

use Config;
use DB;
use Session;


class Core extends Presenter {

	/**
	 * Present the name
	 *
	 * @return string
	 */
	public function name()
	{
		return ucwords($this->entity->name);
	}

	public function status($status)
	{
//dd($status);

		$return = trans('kotoba::general.enabled');
		if ( $status == 0 ) {
			$return = trans('kotoba::general.disabled');
		}

		return $return;
	}

	public function active($active)
	{
//dd($active);

		$return = trans('kotoba::general.yes');
		if ( $active == 0 ) {
			$return = trans('kotoba::general.no');
		}

		return $return;
	}

	public function checked($value)
	{
//dd($value);

		$return = '';

		if ( $value == 1 ) {
			$return = "checked";
		}

		return $return;
	}

}
