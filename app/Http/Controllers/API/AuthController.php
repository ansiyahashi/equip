<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Firebase;
use App\Models\ServiceProvider;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $user_details = User::where('firebase_id',$request->firebase_token)->first();
        
        if(!empty($user_details))
        {
            $user = User::where('id', $user_details->id)->firstOrFail();
            $data['user_details'] = $user_details;
            $data['token'] = $user->createToken('auth_token')->plainTextToken;
            
            $token_user = Firebase::where('user_id', $user_details->id)->first(); 
            
            if(!empty($token_user))
            {
                $token_id = $token_user->id;
                $token_data = Firebase::find($token_id);
                $token_data->token = $request->login_token;
                $token_data->save();

            }
            else
            {
            
                $token = Firebase::create([
                'token'=>$token,
                'user_id'=>$user_details->id,
                ]);
            }
        }
        
        else
        $data = "Invalid user"; 
        
        return $this->sendResponse($data, "Success");
    }
    public function Registration(Request $request)
    {
        if (!empty(User::where('phone', $request->phone)->first())) {

            $message = "Phone already exist";
            return $this->sendError($message);
        }

        // if ($request->password != $request->confirm_password) {

        //     $message = "Password mismatch";
        //     return $this->sendError($message);
        // }
        $service_provider = new ServiceProvider([

            'city' => $request->city,
            'id_no' => $request->id_no,
            'state' => $request->state,
            'landmark' => $request->landmark,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

        ]);
        $service_provider->save();

        $service_provider = $service_provider->id;
        $user_info = [
            'seller_id' => $service_provider,
            'user_type'  => $request->user_type,
            'name' => $request->name,
            'phone'=> $request->phone,
            'firebase_id'=> $request->firebase_token
            // 'password' => bcrypt($request->password),


        ];
        $user = new User();
        $user_info =  $user->create($user_info);

        $user_details = User::with('service_provider_info')->where('users.seller_id', $service_provider)->first();

        $data['user_details'] = $user_details;
        $data['token'] = $user_details->createToken('auth_token')->plainTextToken;

         $firebase_data = [
             'user_id' => $user_info->id,
             'token' => $request->login_token,
            ];
            
        $firebase = new Firebase();
        $firebase->create($firebase_data);
        $this->sendPushNotification($request->login_token, "New Registration", "A new user is registered.");


        return $this->sendResponse($data, "Success");
    }
    public function sendPushNotification($token,$title,$body) {
    
        $url = "https://fcm.googleapis.com/fcm/send";
        $serverKey = 'AAAADI7ef3Q:APA91bGQDRgYI8b3VUHeDvqAE7kXK7Qyv7GokYiwVipmHFNMn9OQ7mlEg8fKisCun7Erbb7Pt5imJioZTM-qlMh5WS5nQREZ9eR4OTZQbIFT9UrKtKbSnC5-Xkccw4wi41Xewkanu7ZT'; 
        $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
        $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
        $json = json_encode($arrayToSend);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Send the request
        $response = curl_exec($ch);
        //Close request
        curl_close($ch);
    }
}

