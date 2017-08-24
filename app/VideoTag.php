<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function adminVideos()
    {
        return $this->belongsToMany('App\AdminVideo');
    }


}
