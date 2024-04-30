<?php

namespace App\PayPal;

class PayPal{
    protected $apiContext;

    public function __construct(){
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                clientId:env('PAYPAL_SANDBOX_CLIENT_ID', ''),
                clientSecret:env('PAYPAL_SANDBOX_CLIENT_SECRET', '')
            )
        );
    }
}