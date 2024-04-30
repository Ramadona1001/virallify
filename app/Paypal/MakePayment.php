<?php

namespace App\PayPal;

use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class MakePayment extends PayPal{

    public function create(){
        $title = 'Course Enrolment';
        $returnURL = env('PAYPAL_SANDBOX_RETURN_URL', '');
        $cancelURL = env('PAYPAL_SANDBOX_CANCEL_URL', '');

        $payer = $this->Payer();

        $item_1 = new Item();
        $item_1->setName($title)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice(100);
    
                /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $details = $this->Details(1,1,1);
        $amount = $this->Amount(100,$details);
        $transaction = $this->Transaction($amount,$item_list,'Test Desc');
        $redirect_urls = $this->RedirectUrls($returnURL,$cancelURL);
        $payment = $this->Payment($payer,$redirect_urls,$transaction);

        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            return redirect($cancelURL)->with('error', $ex->getMessage());
        }


        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectURL = $link->getHref();
                break;
            }
        }
        if (isset($redirectURL)) {
            return Redirect::away($redirectURL);
        }
    }

    protected function Payer():Payer{
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        return $payer;
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
    
    protected function Transaction($amount,$item_list,$desc):Transaction{
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription($desc);
        return $transaction;
    }
    
    protected function RedirectUrls($returnURL,$cancelURL):RedirectUrls{
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($returnURL)
                      ->setCancelUrl($cancelURL);
        return $redirect_urls;
    }
    
    protected function Payment($payer,$redirect_urls,$transaction):Payment{
        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
        return $payment;
    }
}