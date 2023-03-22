<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    public $fillable = [
        'file_name', 'file_original_name','user_id','file_size','extension','type'
    ];

   
    
}
