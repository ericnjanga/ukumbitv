<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'product1', 'product2', 'product3', 'product4', 'flag'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
