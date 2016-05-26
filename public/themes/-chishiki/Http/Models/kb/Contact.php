<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['name', 'subject', 'email', 'message'];
}
