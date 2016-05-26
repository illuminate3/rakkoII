<?php

namespace App\Modules\Chishiki\Http\Repositories;

// use App\Modules\Shisan\Http\Models\Room;
// use App\Modules\Profiles\Http\Models\Profile;

use DB;
use Lang;


class RoomRepository extends BaseRepository {


	/**
	 * The Module instance.
	 *
	 * @var App\Modules\ModuleManager\Http\Models\Module
	 */
	protected $room;

	/**
	 * Create a new ModuleRepository instance.
	 *
   	 * @param  App\Modules\ModuleManager\Http\Models\Module $module
	 * @return void
	 */
	public function __construct(
		Room $room
		)
	{
		$this->model = $room;
	}


	/**
	 * Get role collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function create()
	{
		//
	}


	/**
	 * Get user collection.
	 *
	 * @param  string  $slug
	 * @return Illuminate\Support\Collection
	 */
	public function show($id)
	{
// dd('show');
// 		$room = $this->model->find($id);
// 		return compact('room');
	}


	/**
	 * Get user collection.
	 *
	 * @param  int  $id
	 * @return Illuminate\Support\Collection
	 */
	public function edit($id)
	{
// 		$room = $this->model->find($id);
// 		return compact('room');
	}


	/**
	 * Get all models.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function store($input)
	{
//dd($input);
		$this->model = new Room;
		$this->model->create($input);
	}


	/**
	 * Update a role.
	 *
	 * @param  array  $inputs
	 * @param  int    $id
	 * @return void
	 */
	public function update($input, $id)
	{
//dd($input['enabled']);
		$room = Room::find($id);
		$room->update($input);
	}


// Functions --------------------------------------------------


	public function getUsers()
	{
//		$users = DB::table('users')->lists('name', 'id');
		$users = Profile::all()->lists('full_email', 'id');

		return $users;
	}

	public function getRoom($barcode)
	{
		$room = DB::table('rooms')
			->where('barcode', '=', $barcode)
			->get();
//dd($room);
		return $room;
	}

// public function attachUser($id, $user_id)
// {
// 	$item = Asset::find($id);
// 	$item->users()->attach($user_id);
// }
// public function detachUser($id, $user_id)
// {
// 	$item = Asset::find($id)->users()->detach();
// }

	public function attachUser($id, $user_id)
	{
		$room = Room::find($id);
		$room->users()->attach($user_id);
	}
	public function detachUser($id, $user_id)
	{
		$room = Room::find($id)->users()->detach();
	}

	public function changeStatus($id, $room_status_id)
	{
		DB::table('rooms')
			->where('id', '=', $id)
			->update(array(
				'room_status_id' => $room_status_id
				));

		return;
	}


}
