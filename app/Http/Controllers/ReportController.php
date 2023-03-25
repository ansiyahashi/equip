<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use  App\Models\Item;


class ReportController extends Controller
{
    public function index(Request $request)
    {
//print_r($request);
        $Item=Item::all();
        //print_r($request->Item);
        if ($request->ajax()) {

             if($request->Item)
            {
               
               echo($request->Item);
               $bookings=Booking::where('item_id',$request->Item)->with('booking_details', 'Items')->latest();
         
            }
            //example
            if ($request->date_from) {
                dd($request->date_from);
                $from_date = $request->date_from;
                print_r( $from_date);
                $to_date = $request->date_to;
               // $bookings = $bookings->join('order_details', 'order_details.product_id', '=', 'products.id')->whereBetween('order_details.created_at', [Carbon::parse($from_date)->toDateTimeString(), Carbon::parse($to_date)->toDateTimeString()]);
            }



            if (Auth::user()->user_type == 'admin') {
              
                $bookings = Booking::with('booking_details', 'items')->latest();
            
            } else {
                $bookings = Booking::where('seller_id', Auth::user()->seller_id)->with('booking_details', 'items')->latest();
            }

            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('item_id', function ($row) {
                    return $row->items->name . '<br>' . $row->items->name_ar;
                })
                ->addColumn('price', function ($row) {
                    return $row->sum('price');
                })
                ->rawColumns(['item_id', 'action', 'price'])
                ->make(true);
               // print_r($bookings);   
              
        }
       return view('backend.reports.index',compact('Item'));
       
    }


   
}