<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Settings extends Model
{

	/**
     * @param $table, $fillable
     */
    protected $table = 'kb_settings';
    protected $fillable = ['language', 'dateformat', 'company_name', 'website', 'phone', 'address', 'logo', 'timezone',
        'background', 'version', 'pagination', 'port', 'host', 'encryption', 'email', 'password', ];
}
