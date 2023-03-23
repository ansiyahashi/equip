<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function service_provider()
    {
        return $this->belongsTo(\App\Models\ServiceProvider::class,'seller_id','id')->with('user')->withDefault(); 
    }
    public function images()
    {
        return $this->hasMany(\App\Models\Upload::class,'id','image');
    }
    public function category()
    {
        return $this->hasOne(\App\Models\Category::class,'id','category_id');
    }
     

}
