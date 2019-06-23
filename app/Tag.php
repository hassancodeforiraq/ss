<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   public function materal() {
       return $this->belongsToMany('App\Materal');
   }

   protected $fillable = [
    'tag'
    ];
}
