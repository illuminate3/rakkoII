<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Date_time_format extends Model
{
    public $timestamps = false;
    protected $table = 'date_time_format';
    protected $fillable = ['id', 'format'];
}
