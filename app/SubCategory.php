<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	public function subCategoryImage()
    {
        return $this->hasMany('App\SubCategoryImage');
    }

    public function genres()
    {
        return $this->hasMany('App\Genre');
    }

    public function adminVideo()
    {
        return $this->hasMany('App\AdminVideo');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    
}
