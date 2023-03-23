<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Booking;
use App\Models\BookingDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\ServiceProvider;
use DB;
use Illuminate\Support\Carbon;
class ItemController extends BaseController
{
    public function service_providers(Request $request)
    {
        if ($request->latitude) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $radius = 50;
            $distance_query = "( 6371 * acos( cos( radians($latitude) ) *
                       cos( radians( sellers.latitude ) )
                       * cos( radians( sellers.longitude ) - radians($longitude)
                       ) + sin( radians($latitude) ) *
                       sin( radians( sellers.latitude ) ) )
                     )";
            $response = Seller::select('sellers.*')
                ->addSelect(DB::raw("$distance_query AS distance"))
                ->join('users', 'sellers.id', 'users.seller_id')
                ->whereRaw("$distance_query <= $radius")
                ->with('user', 'products')->get();
            if (count($response) > 0) {
                return $this->sendResponse($response, "Success");
            } else {
                return $this->sendError('No Service Provider found in this Location');
            }
        } else {
            return $this->sendError('Please select a location');
        }
    }
    public function nearest_services(Request $request)
    {
        if ($request->latitude) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $radius = 200;
            
            
             $distance =   "(6371 * acos(cos(radians($latitude)) * 
             cos(radians(items.latitude))
             * cos(radians(items.longitude) - radians($longitude)
             ) + sin(radians($latitude)) * sin(radians(items.latitude))))";
             
            $response = Item::join('service_providers', 'items.seller_id', 'service_providers.id')
                
                ->whereRaw("$distance <= $radius")
                ->with('service_provider','images')->get();
            
             // 
            if (count($response) > 0) {
                return $this->sendResponse($response, "Success");
            } else {
                return $this->sendError('No Assets found in this Location');
            }
        } else {
            return $this->sendError('Please select a location');
        }
    }

    public function service_provider_items(Request $request)
    {
        $seller_id = $request->service_provider_id;
        if(empty($seller_id))
        {
            return $this->sendError('Select a Service Provider');
        }else{
            $assets = Item::with('category','images')->where('seller_id',$seller_id)->get();
            if(count($assets) > 0)
            {
                return $this->sendResponse($assets,'success');
            }else
            {
                return $this->sendError('No Assets found for this Service Provider');
            }

        }
    }
    public function item_details(Request $request)
    {
        $item_id = $request->id;
        if ($item_id) {
            $data = Item::where('id', $item_id)->with('service_provider')->first();
            if (!empty($data)) {
                return $this->sendResponse($data, 'success');
            } else {
                return $this->sendError('No Items Found with this Service Provider');
            }
        } else {
            return $this->sendError('Choose a Vehicle');
        }
    }
    public function booking(Request $request)
    {
       
        $input['seller_id'] = $request->seller_id;
        $input['item_id'] = $request->item_id;
        $input['price'] = $request->price;
        $input['driver'] = $request->driver;
         $input['unit'] = $request->unit;
         $input['time'] = $request->time;
        
        $booking = Booking::create($input);
        if(!empty($booking) > 0 )
        {
            return $this->sendResponse($booking,'success');
        }else
        {
            return $this->sendError('Something went wrong');
        }
    }
    public function booking_details(Request $request)
    {
        $input['booking_id'] = $request->booking_id;
        $input['quantity'] = $request->quantity;
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['phone'] = $request->phone;
        $input['date'] =  date("D M d Y");
        $booking_details = BookingDetails::create($input);
        if(!empty($booking_details) > 0 )
        {
            return $this->sendResponse($booking_details,'success');
        }else
        {
            return $this->sendError('Something went wrong');
        }

    }

}
