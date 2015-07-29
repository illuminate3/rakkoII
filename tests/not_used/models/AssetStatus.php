<?php
namespace App\Modules\Shisan\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class AssetStatus extends Model {

	use PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'asset_statuses';

	protected $presenter = 'App\Modules\Shisan\Http\Presenters\Shisan';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
//	protected $hidden = ['password', 'remember_token'];

// DEFINE Fillable -------------------------------------------------------
/*
			$table->string('name',100)->index();
			$table->string('description')->nullable();
*/
	protected $fillable = [
		'id',
		'name',
		'description'
		];

// DEFINE Relationships --------------------------------------------------


}
