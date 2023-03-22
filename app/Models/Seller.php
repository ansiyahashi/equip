<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['state','city','id_no','landmark','zipcode','country','latitude','longitude'];

    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'seller_id', 'id');
    }
   

    public function products()
    {
        return $this->hasMany(\App\Models\Item::class, 'seller_id', 'id');
    }
}
