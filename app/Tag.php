<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function admin_video()
    {
        return $this->belongsTo('App\AdminVideo');
    }
}
