<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Agent;

use Illuminate\Database\Eloquent\Model;


class Assign_team_agent extends Model
{
    protected $table = 'team_assign_agent';
    protected $fillable = ['id', 'team_id', 'agent_id'];
}
