<?php

namespace App\PayPal\Apis;

use Carbon\Carbon;

class PayPalAPI{
    protected $client_id;
    protected $client_secert;
    protected $unique_id;
    protected $product_name;
    protected $product_desc;
    protected $product_price;
    protected $client_name;
    protected $client_email;
    protected $return_url;
    protected $cancel_url;

    public function __construct($product_name,$product_desc,$product_price,$client_name,$client_email,$return_url,$cancel_url){
        $this->client_id = env('PAYPAL_SANDBOX_CLIENT_ID', '');
        $this->client_secert = env('PAYPAL_SANDBOX_CLIENT_SECRET', '');
        $this->unique_id =  md5(uniqid());
        $this->product_name = $product_name;
        $this->product_desc = $product_desc;
        $this->product_price = $product_price;
        $this->client_name = $client_name;
        $this->client_email = $client_email;
        $this->return_url = $return_url;
        $this->cancel_url = $cancel_url;
    }

    public function getAccessToken(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_USERPWD, $this->client_id . ':' . $this->client_secert);
        
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        $error = curl_error($ch);
        if ($error) {
           return $error;
        }else{
            $response = json_decode($result);
            $token = $response->access_token;
            if ($token) {
                return $token;
            }else{
                return null;
            }
        }
        curl_close($ch);
    }

    public function createProductApi(){
        $ch = curl_init();

        $postParams = array( 
            "name" => $this->product_name, 
            "description" => $this->product_desc, 
            "type" => "DIGITAL", 
            "category" => "SOFTWARE" 
        );

        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/catalogs/products');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParams));

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '.rawurlencode($this->getAccessToken());
        $headers[] = 'Paypal-Request-Id: '.rawurlencode($this->unique_id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            return $error;
        }else{
            $response = json_decode($result);
            $productID = $response->id;
            if ($productID) {
                return $productID;
                exit();
            }else{
                return null;
            }
        }
    }

    public function createPlanApi(){
        $postParams = array(  
            "product_id" => $this->createProductApi(), 
            "name" => $this->product_name, 
            "billing_cycles" => array(  
                array(  
                    "frequency" => array(  
                        "interval_unit" => 'MONTH',  
                        "interval_count" => '1'  
                    ), 
                    "tenure_type" => "REGULAR", 
                    "sequence" => 1, 
                    "total_cycles" => 999, 
                    "pricing_scheme" => array(  
                        "fixed_price" => array(                                     
                            "value" => $this->product_price, 
                            "currency_code" => 'USD' 
                        ) 
                    ), 
                )  
            ), 
            "payment_preferences" => array(  
                "auto_bill_outstanding" => true 
            ) 
        );  

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/plans');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,jso);

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer '.rawurlencode($this->getAccessToken());
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Paypal-Request-Id: '.rawurlencode($this->unique_id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            return $error;
        }else{
            $response = json_decode($result);
            $planID = $response->id;
            return $response;
            exit();
        }
    }
    
    public function createSubscriptionApi(){
        $today = Carbon::now();
        $tomorrow = $today->addDay();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'{
            "plan_id": "'.$this->createPlanApi().'",
            "start_time": "'.$tomorrow->toIso8601ZuluString().'",
            "quantity": "1",
            "shipping_amount": {
                "currency_code": "USD",
                "value": "0"
            },
            "subscriber": {
                "name": {
                    "given_name": "'.$this->client_name.'",
                    "surname": "'.$this->client_name.'"
                },
                "email_address": "'.$this->client_email.'",
                "shipping_address": {
                    "name": {
                        "full_name": "'.$this->client_name.'"
                    },
                    "address": {
                        "address_line_1": "Virallify",
                        "address_line_2": "Virallify",
                        "admin_area_2": "Virallify",
                        "admin_area_1": "Virallify",
                        "postal_code": "Virallify",
                        "country_code": "EG"
                    }
                }
            },
            "application_context": {
                "brand_name": "Virallify",
                "locale": "en-US",
                "shipping_preference": "SET_PROVIDED_ADDRESS",
                "user_action": "SUBSCRIBE_NOW",
                "payment_method": {
                    "payer_selected": "PAYPAL",
                    "payee_preferred": "IMMEDIATE_PAYMENT_REQUIRED"
                },
                "return_url": "'.$this->return_url.'",
                "cancel_url": "'.$this->cancel_url.'"
            }
        }');

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer '.rawurlencode($this->getAccessToken());
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Paypal-Request-Id: '.rawurlencode($this->unique_id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            return $error;
        }else{
            $response = json_decode($result);
            return $response;
            exit();
        }
    }
    
    public function activeSubscriptionApi(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.rawurlencode($this->createSubscriptionApi()).'/activate');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'X-Paypal-Security-Context: {\"consumer\":{\"accountNumber\":1181198218909172527,\"merchantId\":\"PAHL8QWZQRGNQ\"},\"merchant\":{\"accountNumber\":1659371090107732880,\"merchantId\":\"PAHL8QWZQRGNQ\"},\"apiCaller\":{\"clientId\":\"'.$this->client_id.'\",\"appId\":\"APP-6DV794347V142302B\",\"payerId\":\"2J6QB8YJQSJRJ\",\"accountNumber\":\"1659371090107732880\"},\"scopes\":[\"https://api-m.paypal.com/v1/subscription/.*\",\"https://uri.paypal.com/services/subscription\",\"openid\"]}';
        // $headers[] = 'Authorization: Bearer '.rawurlencode($this->getAccessToken());
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            return $error;
        }else{
            $response = json_decode($result);
            dd($response);
            exit();
        }
    }

    

}