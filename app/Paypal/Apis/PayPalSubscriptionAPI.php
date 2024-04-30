<?php

namespace App\PayPal\Apis;

use Carbon\Carbon;

class PayPalSubscriptionAPI extends PayPalAPI{
    protected $client_id;
    protected $client_secert;

    public function __construct(){
        $this->client_id = env('PAYPAL_SANDBOX_CLIENT_ID', '');
        $this->client_secert = env('PAYPAL_SANDBOX_CLIENT_SECRET', '');
    }

    public function getSubscription($subscription_id){ 
        $accessToken = $this->getAccessToken();  
        if(empty($accessToken)){  
            return false;   
        }else{  
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.$subscription_id); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '. $accessToken));  
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
            $api_data = json_decode(curl_exec($ch), true); 
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
            curl_close($ch); 
 
            if ($http_code != 200 && !empty($api_data['error'])) {  
                throw new Exception('Error '.$api_data['error'].': '.$api_data['error_description']);  
            } 
 
            return !empty($api_data) && $http_code == 200?$api_data:false; 
        } 
    }
}