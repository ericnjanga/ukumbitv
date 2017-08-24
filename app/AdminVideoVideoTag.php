<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminVideoVideoTag extends Model
{
    protected $fillable = [
        'admin_video_id', 'video_tag_id'
    ];

    protected $table = 'admin_video_video_tag';
}
