<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    protected $table = 'kb_pages';
    protected $fillable = ['name', 'slug', 'status', 'visibility', 'description'];
}
