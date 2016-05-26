<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Theme;

use Illuminate\Database\Eloquent\Model;


class Widgets extends Model
{
    protected $table = 'widgets';
    protected $fillable = ['name', 'value', 'created_at', 'updated_at'];
}
