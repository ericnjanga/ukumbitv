<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function subcategory() {
        return $this->belongsTo('App\SubCategory');
    }

    public function adminVideo()
    {
        return $this->hasMany('App\AdminVideo');
    }

}
