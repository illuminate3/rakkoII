<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Footer extends Model
{
    protected $table = 'footer';
    protected $fillable = ['title', 'footer'];
}
