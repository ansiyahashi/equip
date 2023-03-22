<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        'city', 'id_no', 'state', 'country', 'landmark', 'zipcode', 'longitude', 'latitude'
    ];
}
