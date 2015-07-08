<?php

namespace App\Modules\Core\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;


class Status extends Model implements TranslatableContract {


	use PresentableTrait;
	use Translatable;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';


// Presenter ---------------------------------------------------------------
	protected $presenter = 'App\Modules\Core\Http\Presenters\Core';


// Translation Model -------------------------------------------------------
	protected $translator = 'App\Modules\Core\Http\Domain\Models\StatusTranslation';


// Hidden ------------------------------------------------------------------
	protected $hidden = [
		'created_at',
		'updated_at'
		];


// Fillable ----------------------------------------------------------------
/*
			$table->string('name')->nullable();
			$table->string('description')->nullable();
*/
	protected $fillable = [
		// Translatable columns
		'name',
		'description'
		];


// Translated Columns ------------------------------------------------------
	protected $translatedAttributes = [
		'name',
		'description'
		];


// Relationships -----------------------------------------------------------
// Functions ---------------------------------------------------------------

	public function getNameAttribute()
	{
		return $this->name;
	}

	public function getDescriptionAttribute()
	{
		return $this->description;
	}


}
