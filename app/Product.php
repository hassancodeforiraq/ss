<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function materal() {
        return $this->hasMany('App\Materal');
    }
}
