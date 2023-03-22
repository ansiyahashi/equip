<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Firebase;
use App\Models\Seller;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {

            return $this->sendError("Invalid login details");
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $user_id = $user->id;
        $user_details = User::where('users.id', $user_id)->first();
        $token = $user->createToken('auth_token')->plainTextToken;
        $api_token = $request->api_token;
        login_notification($api_token, $user_id);
        $data['user_details'] = $user_details;
        $data['token'] = $user->createToken('auth_token')->plainTextToken;

        $api_token = getApiToken($user_id);
        return $this->sendResponse($data, "Success");
    }


    
    public function Registration(Request $request)
    {
        if (!empty(User::where('email', $request->email)->first())) {

            $message = "Email address already exist";
            return $this->sendError($message);
        }

        if ($request->password != $request->confirm_password) {

            $message = "Password mismatch";
            return $this->sendError($message);
        }
        $seller = new Seller([

            'city' => $request->city,
            'id_no' => $request->id_no,
            'state' => $request->state,
            'landmark' => $request->landmark,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

        ]);
        $seller->save();

        $seller = $seller->id;
        $user_info = [
            'seller_id' => $seller,
            'user_type'  => $request->user_type,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),


        ];
        $user = new User();
        $user_info =  $user->create($user_info);

        $user_details = User::with('seller_info')->where('users.seller_id', $seller)->first();

        $data['user_details'] = $user_details;
        $data['token'] = $user_details->createToken('auth_token')->plainTextToken;




        return $this->sendResponse($data, "Success");
    }
}
