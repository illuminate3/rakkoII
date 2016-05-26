<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Guest;

use Illuminate\Database\Eloquent\Model;


class Guest_note extends Model
{
    public $timestamps = false;
    protected $table = 'guest_note';
    protected $fillable = ['id', 'heading', 'content'];
}
