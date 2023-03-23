<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Firebase;
use DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class HomeController extends BaseController
{

    

    public function banners(Request $request)
    {
        $seller_id = $request->service_provider_id;
        if ($seller_id) {
            $banners = Banner::where('seller_id', $seller_id)->get();
            if(count($banners) > 0)
            {
                return $this->sendResponse($banners, "Success");
            }
            else{
                return $this->sendError('No Banners Found');
            }
        }else{
            return $this->sendError('Choose a Service Provider');
        }
    }

    public function category(Request $request)
    {
        $categories = Category::with('cat_images')->get();
        if(!empty($categories))
        {
            return $this->sendResponse($categories,'success');
        }else{
            return $this->sendError('Sorry no categories');
        }
    }
}
