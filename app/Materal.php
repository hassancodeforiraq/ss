<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Soft Delete

class Materal extends Model
{

    public function product() {
        return $this->belongsTo('App\Product');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'many', 'photo', 'slug', 'product_id' // Slug
    ];

    // Soft Delete
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    // images Show
    public function getPhotoAttribute($photo) {
        return asset($photo);
    }

    public function tag() {
        return $this->belongsToMany('App\Tag');
    }

}



