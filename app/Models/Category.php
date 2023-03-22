<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    public function cat_images()
    {
        return $this->hasOne(\App\Models\Upload::class,'id','image')->withDefault(); 
    }
}
