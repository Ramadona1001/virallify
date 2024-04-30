<?php

namespace App\PayPal;

use Illuminate\Support\Facades\Redirect;
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
use PayPal\Api\Transaction;
use PayPal\Common\PayPalModel;

class PayPalSubscriptionPlan extends PayPal{

    public function create($name,$desc,$price,$success_url,$cancel_url){
        $plan = $this->Plan($name,$desc);
        $paymentDefinition = $this->paymentDefinition($name,$price);
        $chargeModel = $this->ChargeModel();
        $paymentDefinition->setChargeModels(array($chargeModel));
        $merchantPreferences = $this->MerchantPreferences($success_url,$cancel_url);
        
        
        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);
        
        $output = $plan->create($this->apiContext);

        return $output;
    }

    public function listPlans(){
        $params = array('page_size'=>'2');
        $planList = Plan::all($params,$this->apiContext);
        return $planList;
    }
    
    public function planDetails($id){
        $plan = Plan::get($id,$this->apiContext);
        return $plan;
    }

    public function activate($id){
        $createdPlan = $this->planDetails($id);
        $patch = new Patch();
        $value = new PayPalModel('{
            "state":"ACTIVE"
        }');
        $patch->setOp('replace')
              ->setPath('/')
              ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);
        $createdPlan->update($patchRequest,$this->apiContext);
        $plan = Plan::get($createdPlan->getId(),$this->apiContext);
        return $plan;
    }
    
    // public function paySubscriptionPlan($id){
    //     $planId = $id; // Replace with the actual plan ID you obtained during plan creation

    //     // Set up payer details
    //     $payer = new Payer();
    //     $payer->setPaymentMethod('paypal');

    //     // Set up redirect URLs
    //     $redirectUrls = new RedirectUrls();
    //     $redirectUrls->setReturnUrl('https://www.google.com')
    //         ->setCancelUrl('https://www.youtube.com');

    //     // Set up subscription details
    //     $subscription = new \PayPal\Api\Subscription();
    //     $subscription->setPlanId($planId);

    //     // Set up payment details
    //     $payment = new \PayPal\Api\Payment();
    //     $payment->setIntent('subscription')
    //         ->setPayer($payer)
    //         ->setRedirectUrls($redirectUrls)
    //         ->setTransactions([$subscription]);

    //     // Create the payment
    //     try {
    //         $payment->create($this->apiContext);

    //         // Get the approval link
    //         $approvalLink = $payment->getApprovalLink();
    //         return $approvalLink;
    //         // Output the approval link for redirection
    //         // echo 'Subscription Payment Approval Link: ' . $approvalLink;
    //     } catch (\PayPal\Exception\PayPalConnectionException $ex) {
    //         echo 'PayPal Error: ' . $ex->getMessage();
    //     }
    // }


    /////////////////////////////////////////////////////////////////////////

    protected function Plan($name,$desc):Plan{
        $plan = new Plan();
        $plan->setName($name)
             ->setDescription($desc)
             ->setType('DIGITAL');
        return $plan;
    }
    
    protected function PaymentDefinition($name,$price):PaymentDefinition{
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName($name)
                          ->setType('REGULAR')
                          ->setFrequency('MONTH')
                          ->setFrequencyInterval("1")
                          ->setCycles("12")
                          ->setAmount(new Currency(array('value'=>$price,'currency'=>'USD')));
        return $paymentDefinition;
    }
    
    protected function ChargeModel():ChargeModel{
        $chargeModel = new ChargeModel();
        $chargeModel->setType('SHIPPING')
                    ->setAmount(new Currency(array('value'=>0,'currency'=>'USD')));
        return $chargeModel;
    }
    
    protected function MerchantPreferences($success_url,$cancel_url):MerchantPreferences{
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl($success_url)
                            ->setCancelUrl($cancel_url)
                            ->setAutoBillAmount("yes")
                            ->setInitialFailAmountAction("CONTINUE")
                            ->setMaxFailAttempts("0")
                            ->setSetupFee(new Currency(array('value'=>100,'currency'=>'USD')));
        return $merchantPreferences;
    }
}