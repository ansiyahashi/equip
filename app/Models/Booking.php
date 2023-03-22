<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function booking_details()
    {
        return $this->hasOne(\App\Models\BookingDetails::class, 'booking_id','id');
    }
    public function 
    ()
    {
        return $this->hasOne(\App\Models\Item::class, 'id','item_id');
    }
}
