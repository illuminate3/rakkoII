<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    public $table = 'country';
    protected $fillable = ['country_code', 'country_name'];
}
