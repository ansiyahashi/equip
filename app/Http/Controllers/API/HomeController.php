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
        $seller_id = $request->seller_id;
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
            return $this->sendError('Seller missing');
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

    public function listcategory(Request $request)
    {
       $category= category::all();
       if(count($category)>0)
       {
        return $this->sendResponse($category, "Success");
       }
      else
      {
        return $this->sendError('Sorry no categories'); 
      }

   
    }

    public function addcategory(Request $request)
    {
       $category= new category();
       $category->name=$request->name;
       $category->name_ar=$request->name_ar;
       $category->description=$request->description;
       $category->description_ar=$request->description_ar;
       $category->image=$request->image;
       $res=$category->save();
       if($res>0)
       {

       return $this->sendResponse($category,"success");
       }
       else{


        return $this->sendError("addition failed");
       }


    }
    public function editcategory(Request $request)
    {
        $category=category::find($request->id);
        $category->name=$request->name;
        $category->name_ar=$request->name_ar;
        $category->description=$request->description;
        $category->description_ar=$request->description_ar;
        $category->image=$request->image;
        $res=$category->update();

        if($res>0)
        {
            return $this->sendResponse($category,"updated successfully");
        }
        else
        {
            return $this->sendError("updation failed");
        
        }


    }
    public function deletecategory(Request $request)
    {
        
          $category=category::find( $request->id);
          $res=$category->delete();
         if($res>0)
          {
         return $this->sendResponse("success","deleted successfully");
         }
         else{

         return $this->sendError("deletion failed");

         }
    }
}
