<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xray extends Model
{
   protected $fillable = ['title','type','number','ticket_id'];

   public function ticket() {
       return $this->belongsTo('App\Ticket');
   }

}
