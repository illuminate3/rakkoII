<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Agent;

use Illuminate\Database\Eloquent\Model;


class Teams extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'name', 'status', 'team_lead', 'assign_alert', 'admin_notes',
    ];
}
