<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 'admin_video_id', 'user_id'
    ];

//    protected $appends = ['userAvatar'];

    public function adminVideo()
    {
        return $this->belongsTo('App\AdminVideo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
