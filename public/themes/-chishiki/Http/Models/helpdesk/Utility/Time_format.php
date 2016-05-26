<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Time_format extends Model
{
    public $timestamps = false;
    protected $table = 'time_format';
    protected $fillable = ['id', 'format'];
}
