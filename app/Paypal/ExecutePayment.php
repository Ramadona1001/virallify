<?php

namespace App\PayPal;

use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class ExecutePayment extends PayPal{

    public function execute(){
        $payment = $this->GetThePayment();
        $execution = $this->CreateExecution();
        $details = $this->Details(1,1,1);
        $amount = $this->Amount(100,$details);
        $transaction = $this->Transaction($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution,$this->apiContext);
        return $result;
    }

    protected function GetThePayment():Payment{
        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId,$this->apiContext);
        return $payment;
    }

    protected function CreateExecution():PaymentExecution{
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));
        return $execution;
    }
    
    protected function Details($shipping,$tax,$sub_total):Details{
        $details = new Details();
        $details->setShipping($shipping)
                ->setTax($tax)
                ->setSubtotal($sub_total);
        return $details;
    }

    protected function Amount($total,$details):Amount{
        $amount = new Amount();
        $amount->setCurrency('USD')
               ->setTotal($total)
               ->setDetails($details);
        return $amount;
    }

    protected function Transaction($amount):Transaction{
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        return $transaction;
    }
}