<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Timezone extends Model
{
    protected $table = 'timezones';
    protected $fillable = ['id', 'name', 'location'];
}
