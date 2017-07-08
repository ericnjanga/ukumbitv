<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videoimage extends Model
{
    public function adminVideo()
    {
        return $this->belongsTo('App\AdminVideo');
    }
}
