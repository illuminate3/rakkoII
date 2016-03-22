<?php

namespace App\Modules\Horitsu\Http\Repositories;

use App\Modules\Horitsu\Http\Models\Code;

use App;
use Cache;
use DB;
use Session;


class CodeRepository extends BaseRepository {

	/**
	 * The Module instance.
	 *
	 * @var App\Modules\ModuleManager\Http\Models\Module
	 */
	protected $code;

	/**
	 * Create a new ModuleRepository instance.
	 *
   	 * @param  App\Modules\ModuleManager\Http\Models\Module $module
	 * @return void
	 */
	public function __construct(
		Code $code
		)
	{
		$this->model = $code;
	}


	/**
	 * Get role collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function create()
	{
//		$allPermissions =  $this->permission->all()->lists('name', 'id');
//dd($allPermissions);

		return compact('');
	}


	/**
	 * Get user collection.
	 *
	 * @param  string  $slug
	 * @return Illuminate\Support\Collection
	 */
	public function show($id)
	{
		$code = $this->model->find($id);
//dd($module);

		return compact('code');
	}


	/**
	 * Get user collection.
	 *
	 * @param  int  $id
	 * @return Illuminate\Support\Collection
	 */
	public function edit($id)
	{
// 		$code = $this->model->find($id);
// 		return compact('code');
	}


	/**
	 * Get all models.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function store($input)
	{
//dd($input);
// 		$this->model = new Code;
// 		$this->model->create($input);

		$code = Code::create();
		$locales = Cache::get('languages');
		$original_locale = Session::get('locale');
//dd($locales);

		foreach($locales as $locale)
		{
			App::setLocale($locale->locale);

			$values = [
				'name'				=> $input['name_' . $locale->id],
				'description'		=> $input['description_' . $locale->id]
			];

			$code->update($values);
		}

		App::setLocale($original_locale);
		return;
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
// 		$code = Code::find($id);
// 		$code->update($input);

		$code = Code::find($id);
		$locales = Cache::get('languages');
		$original_locale = Session::get('locale');
//dd($locales);

		foreach($locales as $locale)
		{
			App::setLocale($locale->locale);

			$values = [
				'name'				=> $input['name_' . $locale->id],
				'description'		=> $input['description_' . $locale->id]
			];

			$code->update($values);
		}

		App::setLocale($original_locale);
		return;
	}

}
