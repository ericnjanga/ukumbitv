<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'product1', 'product2', 'product3', 'product4', 'flag', 'paypal_plan_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
