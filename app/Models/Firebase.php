<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firebase extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'token'];

    public static function sendPushNotification($token, $title, $body)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAYkknYwE:APA91bHEClA3Y576vGX-ULYQubCovg07WpNMWUnYrugpIy_wCr0htN2BYuc8e4aT2fyrYkCPEawmtZDYXDmtv57V_TTSyimOfq1W485ZuKg9N4nxteYBwkQKsPcolMgdNo4Tiy-rWrev';
        $notification = ['title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1'];
        $arrayToSend = ['to' => $token, 'notification' => $notification, 'priority' => 'high'];
        $json = json_encode($arrayToSend);
        $headers = [];
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=' . $serverKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Send the request
        $response = curl_exec($ch);
        //Close request
        curl_close($ch);
        //return $response;
        return json_encode($response);
    }
}
