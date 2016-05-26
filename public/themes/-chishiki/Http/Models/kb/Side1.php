<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Side1 extends Model
{
    protected $table = 'side1';
    protected $fillable = ['title', 'content'];
}
