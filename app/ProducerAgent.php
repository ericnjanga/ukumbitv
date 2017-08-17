<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducerAgent extends Model
{
   // protected $dates = ['created_at', 'updated_at', 'contract_expiration'];

    protected $fillable = [
        'name', 'royalties', 'contract_expiration', 'providers', 'email', 'password', 'description'
    ];
}
