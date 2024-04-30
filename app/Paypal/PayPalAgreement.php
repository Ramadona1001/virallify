<?php

namespace App\PayPal;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Agreement;
use PayPal\Api\Amount;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Transaction;
use PayPal\Common\PayPalModel;
use PayPal\Exception\PayPalConnectionException;

class PayPalAgreement extends PayPal{

    public function create($name,$desc,$id){
        return $this->agreement($name,$desc,$id);
    }

    public function executeAgreement($token){
        
        $agreement = new Agreement();
        $agreement->execute($token,$this->apiContext);
    }

    protected function agreement($name,$desc,$id){
        $startDateTime = Carbon::now()->addMonth()->startOfMonth();

        $agreement = new Agreement();
        $agreement->setName($name)
                  ->setDescription($desc)
                  ->setStartDate($startDateTime->toIso8601String());
        
        $agreement->setPlan($this->plan($id));
        $agreement->setPayer($this->payer());
        $agreement->setShippingAddress($this->shipping());

        
        try {
            $agreement = $agreement->create($this->apiContext);
        } catch (PayPalConnectionException  $th) {
            echo $th->getCode();
            echo $th->getData();
            die($th);
        }
        return $agreement->getApprovalLink();
    }

    protected function plan($id):Plan{
        $plan = new Plan();
        $plan->setId($id);
        return $plan;
    }
    
    protected function payer():Payer{
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        return $payer;
    }
    
    protected function shipping():ShippingAddress{
        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('VIRALLIFY')
                        ->setCity('VIRALLIFY')
                        ->setState('VIRALLIFY')
                        ->setPostalCode('VIRALLIFY')
                        ->setCountryCode('US');
        return $shippingAddress;
    }
}