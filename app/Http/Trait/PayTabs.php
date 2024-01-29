<?php

namespace App\Http\Trait;

trait PayTabs
{
    public function sendPayment($amount,$user_name,$user_email,$user_mobile,$payment_method,$redirect_url = null,$error_url = null)
    {
        $client = new \GuzzleHttp\Client();
        if ($redirect_url == null) {
            $redirect_url = url('api/backend/payment-transactions/redirectIfSuccess');
        }
        if ($error_url == null) {
            $error_url = url('api/error_payment');
        }
        $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
        'body' => 
            '{
                "amount":"'.$amount.'",
                "currency":"KWD","customer_initiated":true,"threeDSecure":true,"save_card":false,
                "description":"Test Description",
                "metadata":{
                "udf1":"Metadata 1" ,
                "subscribe_id" : "1" ,
                "customer_id" : "1"
            },
            "reference":{
                "transaction":"txn_01",
                "order":"ord_01"
            },
            "receipt":{"email":true,"sms":true},
            "customer":{
            "first_name":"'.$user_name.'",
            "email":"'.$user_email.'",
            "phone":{"country_code":"+20"
            ,"number":"'.$user_mobile.'"}},
            "source":
                {"id":"'.$payment_method.'"
            },
            "post":{"url":"'.$error_url.'"},
            "redirect":{"url":"'.$redirect_url.'"}}',
            'headers' => [
                'Authorization' => 'Bearer sk_test_07j8TsngUhlEKdBRNVDGc14b',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return $response;
    }
    
    public function checkPayment($charge_id)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.tap.company/v2/charges/'.$charge_id, [
        'headers' => [
            'Authorization' => 'Bearer sk_test_07j8TsngUhlEKdBRNVDGc14b',
            'accept' => 'application/json',
            ],
        ]);


        return $response;
    }
}