<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Social extends Model
{
    protected $table = 'social';
    protected $fillable = ['linkedin', 'stumble', 'google', 'deviantart', 'flickr', 'skype', 'rss', 'twitter', 'facebook', 'youtube', 'vimeo', 'pinterest', 'dribbble', 'instagram'];
}
