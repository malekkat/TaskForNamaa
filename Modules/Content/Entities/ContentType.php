<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;

class contentType extends Model
{
    protected $table = 'content_type';
    protected $fillable = ['content_type'];
}
