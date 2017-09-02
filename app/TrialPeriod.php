<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrialPeriod extends Model
{
    protected $fillable = [
        'user_id', 'admin_video_id'
    ];
}
