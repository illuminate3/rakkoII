<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Form_type extends Model
{
    protected $table = 'form_type';
    protected $fillable = [
        'id', 'type',
    ];
}
