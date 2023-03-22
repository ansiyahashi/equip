<?php

use Illuminate\Support\Facades\DB;
use App\Models\Upload;
use App\Models\Firebase;
use App\Models\BusinessSetting;
use App\Models\Currency;

function image_preview($id)
{
  if (isset($id)) {
    $image_name =  Upload::where('id', '=', $id)->pluck('file_name')->first();
    $path = asset('public/'.$image_name);
    return $path;
  } else {
    $path = asset('public/uploads/all/image19c9b089ff5f2caa89c04cbcb20e4426.jpg');
    return $path;
  }
}

function get_shop_id()
{
  echo auth()->user()->shop_id;
}

function decf($amount)
{
    return number_format($amount,2).' '.'SAR';
}
function sendPushNotification($token, $title, $body)
{
  $url = "https://fcm.googleapis.com/fcm/send";
  $serverKey = 'AAAAYkknYwE:APA91bHEClA3Y576vGX-ULYQubCovg07WpNMWUnYrugpIy_wCr0htN2BYuc8e4aT2fyrYkCPEawmtZDYXDmtv57V_TTSyimOfq1W485ZuKg9N4nxteYBwkQKsPcolMgdNo4Tiy-rWrev';
  $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');
  $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
  $json = json_encode($arrayToSend);
  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'Authorization: key=' . $serverKey;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  //Send the request
  $response = curl_exec($ch);
 // print_r($response);
  //Close request
  curl_close($ch);
}
function login_notification($token, $user_id)
{

  $firebase_row = Firebase::where('user_id', $user_id)->first();
  
  
  
  if (!empty($firebase_row)){
     
    $api_token_id = $firebase_row->id;
    $token_data = Firebase::find($api_token_id);
    $token_data->token = $token;
    $token_data->save();
  } else {

    $firebase_data = [
      'user_id' => $user_id,
      'token' => $token,
    ];
    $firebase = new Firebase();
    $firebase->create($firebase_data);
  }
}
function getApiToken($user_id)
{
  $firebase_row = Firebase::where('user_id', $user_id)->first();
  if (!empty($firebase_row)){
    return  $firebase_row->token;
  }
  else{
    return  "No Token Exists";
  }

}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        if ($lang == false) {
            $setting = $settings->where('type', $key)->first();
        } else {
            $setting = $settings->where('type', $key)->where('lang', $lang)->first();
            $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        }
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('single_price')) {
    function single_price($price)
    {
        return format_price(convert_price($price));
    }
}
//converts currency to home default currency
if (!function_exists('convert_price')) {
    function convert_price($price)
    {
        if (Session::has('currency_code') && (Session::get('currency_code') != get_system_default_currency()->code)) {
            $price = floatval($price) / floatval(get_system_default_currency()->exchange_rate);
            $price = floatval($price) * floatval(Session::get('currency_exchange_rate'));
        }
        return $price;
    }
}
if (!function_exists('get_system_default_currency')) {
    function get_system_default_currency()
    {
        return Cache::remember('system_default_currency', 86400, function(){
            return Currency::findOrFail(get_setting('system_default_currency'));
        });
    }
}

//gets currency symbol
if (!function_exists('currency_symbol')) {
    function currency_symbol()
    {
        if (Session::has('currency_symbol')) {
            return Session::get('currency_symbol');
        }
        return get_system_default_currency()->symbol;
    }
}

//formats currency
if (!function_exists('format_price')) {
    function format_price($price)
    {
        if (get_setting('decimal_separator') == 1) {
            $fomated_price = number_format($price, get_setting('no_of_decimals'));
        } else {
            $fomated_price = number_format($price, get_setting('no_of_decimals'), ',', ' ');
        }

        if (get_setting('symbol_format') == 1) {
            return currency_symbol() . $fomated_price;
        } else if (get_setting('symbol_format') == 3) {
            return currency_symbol() . ' ' . $fomated_price;
        } else if (get_setting('symbol_format') == 4) {
            return $fomated_price . ' ' . currency_symbol();
        }
        return $fomated_price . currency_symbol();

    }
}

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            return app('url')->asset('public/' . $path, $secure);
        }
    }
}
if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

