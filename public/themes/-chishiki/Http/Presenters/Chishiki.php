<?php

namespace App\Modules\Chishiki\Http\Presenters;

use Laracasts\Presenter\Presenter;

use DB;


class Chishiki extends Presenter {


	/**
	 * Present name
	 *
	 * @return string
	 */
	public function name()
	{
		return ucwords($this->entity->name);
	}


	public function itemName($item_id)
	{
//dd($item);
		$return = '';

		$item = DB::table('items')
			->where('id', '=', $item_id)
			->get();
//dd($item);
//dd(isset($contact['0']->last_name));

		$name = '';
		$name = $item['0']->make . '&nbsp;:&nbsp;' . $item['0']->model . '&nbsp;:&nbsp;' . $item['0']->model_number;
//dd($name);

		return $name;
	}


	public function roomName($room_id)
	{
//dd($room_id);
		$return   = '';
		if ( $room_id == null ) {
			$room_name = trans('kotoba::general.empty');
		} else {
			$room_name = DB::table('rooms')
				->where('id', '=', $room_id)
				->pluck('name');
		}
//
			return $room_name;
	}


	public function vendorName($vendor_id)
	{
//dd($room_id);
		$return   = '';
		if ( $vendor_id == null ) {
			$room_name = trans('kotoba::general.empty');
		} else {
			$vendor_name = DB::table('vendors')
				->where('id', '=', $vendor_id)
				->pluck('name');
		}
//
			return $vendor_name;
	}


	public function siteName($site_id)
	{
//dd($site_id);
		$return = '';
		$site = DB::table('sites')
			->where('id', '=', $site_id)
			->pluck('name');
		return $site;
	}


	public function site($site_id)
	{
		$site   = '';
//dd($site_id);
		if ( $site_id == null ) {
			$return = trans('kotoba::general.empty');
		} else {
			$site = DB::table('sites')
				->where('id', '=', $site_id)
				->pluck('name');
		}
//dd($site);
			return $site;
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


	public function techStatus($tech_status_id, $locale_id)
	{
		$news_status = DB::table('tech_status_translations')
			->where('id', '=', $tech_status_id)
			->where('locale_id', '=', $locale_id, 'AND')
			->pluck('name');

		return $news_status;
	}


	public function employeeName($user_id)
	{
		$employee = DB::table('profiles')
			->where('user_id', '=', $user_id)
			->select('last_name', 'first_name', 'middle_initial')
			->first();
//dd($employee);

		if ( count($employee) ) {
			return $employee->last_name . ',&nbsp;' . $employee->first_name . '&nbsp;' . $employee->middle_initial;
		} else {
			return trans('kotoba::general.none');
		}

	}


	public function userName($user_id)
	{
//dd($user_id);
		$return = '';

		$user = DB::table('users')
			->where('users.id', '=', $user_id)
			->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
			->get();
//dd(isset($contact['0']->last_name));

		$name = '';
		if ( isset($user['0']->last_name) ) {
			$name .= '&nbsp;' . $user['0']->last_name;
		}
		if ( isset($user['0']->first_name) ) {
			$name .= ',&nbsp;' . $user['0']->first_name;
		}
		if ( isset($user['0']->middle_initial) ) {
			$name .= '&nbsp;' . $user['0']->middle_initial;
		}
//dd($name);

		return $name;
	}


}
