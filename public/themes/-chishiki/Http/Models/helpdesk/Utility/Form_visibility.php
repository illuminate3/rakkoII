<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Utility;

use Illuminate\Database\Eloquent\Model;


class Form_visibility extends Model
{
    protected $table = 'form_visibility';
    protected $fillable = [
        'id', 'visibility',
    ];
}
