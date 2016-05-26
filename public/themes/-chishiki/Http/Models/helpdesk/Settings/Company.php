<?php

namespace App\Modules\Chishiki\Http\Models\helpdesk\Settings;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    protected $table = 'settings_company';
    protected $fillable = [
        'company_name', 'website', 'phone', 'address', 'landing_page', 'offline_page',
        'thank_page', 'logo', 'use_logo',
    ];
}
