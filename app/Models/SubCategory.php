<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    public function cat()
    {
        return $this->belongsTo(\App\Models\Category::class,'cat_id','id')->withDefault(); 
    }
}
