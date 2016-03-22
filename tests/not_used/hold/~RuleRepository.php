<?php

namespace App\Modules\Horitsu\Http\Repositories;

use App\Modules\Horitsu\Http\Models\Rule;

use App;
use Cache;
use DB;
use Session;


class RuleRepository extends BaseRepository {

	/**
	 * The Module instance.
	 *
	 * @var App\Modules\ModuleManager\Http\Models\Module
	 */
	protected $rule;

	/**
	 * Create a new ModuleRepository instance.
	 *
   	 * @param  App\Modules\ModuleManager\Http\Models\Module $module
	 * @return void
	 */
	public function __construct(
		Rule $rule
		)
	{
		$this->model = $rule;
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
		$rule = $this->model->find($id);
//dd($module);

		return compact('rule');
	}


	/**
	 * Get user collection.
	 *
	 * @param  int  $id
	 * @return Illuminate\Support\Collection
	 */
	public function edit($id)
	{
// 		$rule = $this->model->find($id);
// 		return compact('rule');
	}


	/**
	 * Get all models.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function store($input)
	{
//dd($input);
// 		$this->model = new Rule;
// 		$this->model->create($input);

		$rule = Rule::create();
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

			$rule->update($values);
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
// 		$rule = Rule::find($id);
// 		$rule->update($input);

		$rule = Rule::find($id);
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

			$rule->update($values);
		}

		App::setLocale($original_locale);
		return;
	}

}
