<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoDirector extends Model
{
    protected $fillable = [
        'name', 'bio'
    ];

    public function adminVideos()
    {
        return $this->belongsToMany('App\AdminVideo');
    }
}
