<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Timezones extends Model
{
    public $timestamps = false;
    protected $table = 'timezone';
    protected $fillable = ['name', 'location'];
}
