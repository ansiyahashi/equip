<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
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
        }
        return view('backend.reports.index');
    }
}
