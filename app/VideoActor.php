<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoActor extends Model
{
    protected $fillable = [
        'name', 'bio'
    ];

    public function adminVideos()
    {
        return $this->belongsToMany('App\AdminVideo');
    }
}
