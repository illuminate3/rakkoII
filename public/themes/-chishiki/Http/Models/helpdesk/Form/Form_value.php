<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Form;

use Illuminate\Database\Eloquent\Model;


class Form_value extends Model
{
    public $timestamps = false;
    protected $table = 'form_value';
    protected $fillable = ['id', 'values'];
}
