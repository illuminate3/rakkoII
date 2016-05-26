<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = ['id', 'faq'];
}
