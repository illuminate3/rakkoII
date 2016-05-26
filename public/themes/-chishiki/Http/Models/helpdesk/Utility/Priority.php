<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Priority extends Model
{
    public $timestamps = false;
    protected $table = 'priority';
    protected $fillable = [
        'id', 'name',
    ];
}
