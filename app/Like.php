<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'admin_video_id', 'type'
    ];

    public function admin_video()
    {
        return $this->belongsTo('App\AdminVideo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
