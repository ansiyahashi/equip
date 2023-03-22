<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seller()
    {
        return $this->belongsTo(\App\Models\Seller::class,'seller_id','id')->with('user')->withDefault(); 
    }
    public function images()
    {
        return $this->hasMany(\App\Models\Upload::class,'id','im
        age');
    }
    public function category()
    {
        return $this->hasOne(\App\Models\Category::class,'id','category_id');
    }
     

}
