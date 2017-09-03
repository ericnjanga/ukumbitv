<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaymentPlan extends Model
{
    protected $fillable = [
        'user_id', 'payment_plan_id', 'expiry_date'
    ];

    protected $table = 'payment_plan_user';
}
