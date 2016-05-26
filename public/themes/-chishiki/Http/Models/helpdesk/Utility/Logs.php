<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Logs extends Model
{
    public $timestamps = false;
    protected $table = 'logs';
    protected $fillable = ['id', 'level'];
}
