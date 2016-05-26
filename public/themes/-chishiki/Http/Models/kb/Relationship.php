<?php

namespace App\Modules\Chishiki\Http\Models\kb;

use Illuminate\Database\Eloquent\Model;


class Relationship extends Model
{

	/* define the table  */

    protected $table = 'kb_article_relationship';
    /* define fillable fields */
    protected $fillable = ['id', 'category_id', 'article_id'];
}
