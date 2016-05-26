<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Ticket;

use Illuminate\Database\Eloquent\Model;


class Ticket_source extends Model
{
    public $timestamps = false;
    protected $table = 'ticket_source';
    protected $fillable = [
        'name', 'value',
    ];
}
