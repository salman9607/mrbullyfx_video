<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = ['title','thumbnail','slug', 'url', 'user_id', 'description', 'ip_address', 'category','views','duration', 'created_at', 'updated_at'];
}
