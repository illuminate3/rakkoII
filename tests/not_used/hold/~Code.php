<?php

namespace App\Modules\Horitsu\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;


class Code extends Model implements TranslatableContract {


	use PresentableTrait;
	use Translatable;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'codes';

// Presenter ---------------------------------------------------------------
	protected $presenter = 'App\Modules\Horitsu\Http\Presenters\Horitsu';

// Translation Model -------------------------------------------------------
	protected $translator = 'App\Modules\Horitsu\Http\Models\CodeTranslation';

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

// hasMany
// belongsTo
// belongsToMany

// 	public function users()
// 	{
// 		return $this->belongsToMany('App\Modules\Kagi\Http\Models\User', 'code_user');
// 	}


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
