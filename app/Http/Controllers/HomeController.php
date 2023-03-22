<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use  App\Models\Booking;
use  App\Models\BookingDetails;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
                                                                                            
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        
        



       $User=User::all();
       $Bookingdetails=Booking::with('booking_details','items')->where('seller_id',1)->get();

       //print_r($Bookingdetails);

       return view('dashboard.dashboard',compact('User','Bookingdetails'));
       
    }




       
       

       
    
}
