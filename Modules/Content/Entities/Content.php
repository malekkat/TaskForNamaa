<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class content extends Model
{
    use SoftDeletes;
    protected $table = 'content';
    protected $fillable = ['subject','created_by','text_content'
        ,'content_type_id','created_date','created_time'];
    protected $date =['delete_at'];
}
