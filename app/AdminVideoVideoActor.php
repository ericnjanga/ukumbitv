<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminVideoVideoActor extends Model
{
    protected $fillable = [
        'admin_video_id', 'video_actor_id'
    ];

    protected $table = 'admin_video_video_actor';
}
