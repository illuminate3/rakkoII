<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Form;

use Illuminate\Database\Eloquent\Model;


class Fields extends Model
{
    protected $table = 'custom_form_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['forms_id', 'label', 'name', 'type', 'value', 'required'];
}
