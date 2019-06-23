<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['name','age','gender','place','phone'];

    public function xray() {
        return $this->hasMany('App\Xray');
    }

    public function scopePage($query) {
        return $query->where('name','like','%' . request('search') . '%')
                   ->orWhere('age','like', '%' . request('search') . '%');

    }

    
}
