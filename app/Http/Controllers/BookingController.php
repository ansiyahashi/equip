<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
     
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(Auth::user()->user_type=='admin')
            {
                $bookings = Booking::with('booking_details','items')->latest();
            }else
            {
                $bookings = Booking::where('seller_id',Auth::user()->seller_id)->with('booking_details','items')->latest();
            }
            
            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('item_id', function ($row){
                      return $row->items->name.'<br>'.$row->items->name_ar;
                })
                ->addColumn('model', function ($row){
                      return $row->items->model_no;
                })
                ->addColumn('quantity', function ($row){
                      return $row->booking_details->quantity;
                })
                ->addColumn('driver', function ($row){
                      return $row->driver == 1 ? 'Yes' : 'No';
                })
                ->addColumn('date', function ($row){
                      return $row->created_at;
                })
                ->addColumn('customer_details', function ($row){
                      return $row->booking_details->name.'<br>'.$row->booking_details->email.'<br>'.$row->booking_details->phone.'<br>';
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a class="btn btn-success"   type="button"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>';
                    $btn = $btn . '<button class="btn btn-danger ml-3"   type="button"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>';

                    return $btn;
                })
                ->rawColumns(['image', 'action','item_id','customer_details'])
                ->make(true);
        }
        return view('backend.bookings.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
