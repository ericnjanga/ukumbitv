<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPlaylist extends Model
{
    protected $fillable = [
        'user_id', 'admin_video_id'
    ];

    protected $table = 'user_playlists';


}
