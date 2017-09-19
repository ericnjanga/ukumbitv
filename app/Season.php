<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'admin_video_id', 'vimeo_album_id', 'title'
    ];

    public function adminVideo()
    {
        return $this->belongsTo('App\AdminVideo');
    }
}
