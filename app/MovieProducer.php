<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieProducer extends Model
{
   // protected $dates = ['created_at', 'updated_at', 'contract_expiration'];

    protected $fillable = [
        'name', 'royalties', 'contract_expiration', 'producer_agent_id', 'email', 'password', 'description'
    ];

    public function adminVideos()
    {
        return $this->hasMany('App\AdminVideo');
    }
}
