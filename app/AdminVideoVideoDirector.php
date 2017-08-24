<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminVideoVideoDirector extends Model
{
    protected $fillable = [
        'admin_video_id', 'video_director_id'
    ];

    protected $table = 'admin_video_video_director';
}
