<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;
    protected $fillable =['state','city','id_no','landmark','zipcode','country','latitude','longitude'];
    
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'seller_id', 'id');
    }
   

    public function assets()
    {
        return $this->hasMany(\App\Models\Item::class, 'seller_id', 'id');
    }
}
