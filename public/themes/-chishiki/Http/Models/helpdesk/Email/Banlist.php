<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Email;

use Illuminate\Database\Eloquent\Model;


class Banlist extends Model
{
    protected $table = 'banlist';
    protected $fillable = [
        'id', 'ban_status', 'email_address', 'internal_notes',
    ];
}
