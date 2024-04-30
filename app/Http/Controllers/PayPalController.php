<?php

namespace App\Http\Controllers;

use App\Http\Trait\PayPal;
use App\PayPal\Apis\PayPalAPI;
use App\PayPal\Apis\PayPalSubscriptionAPI;
use App\PayPal\PayPalAgreement;
use App\PayPal\PayPalSubscriptionPlan;
use App\PayPal\SubscriptionPlan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Plans\Models\UserPlan;
use Plans\Models\UserSubscription;

// use PayPal\Apis\PayPal;

class PayPalController extends Controller
{
  private $api_context;
  use PayPal;

  public function __construct()
  {
    
  }

  public function paymentPage(){
    return view('paypal.index');
  }
  
  public function testroutetype(){
      $plan_id = '6';
      $product_name = 'Virallify';
      $product_price = '100';
      $paypal = new PayPalAPI('Virallify','Virallify',100,'Ahmed Ramadan','ahmed.ramadan@ocoda.com',route('payment.success'),route('payment.fail'));
      $access_token = $paypal->getAccessToken();
      $product = $paypal->createProductApi();
      dd($product);
      $plan = $paypal->createPlanApi();
      // $subscription = $paypal->createSubscriptionApi();
      // dd($subscription);
      // $approval_link = '';
      // if ($subscription != null) {
      //   foreach ($subscription->links as $link) {
      //     if ($link->rel == 'approve') {
      //       $approval_link = $link->href;
      //     }
      //   }
      // }
      // if ($approval_link != '') {
      //     return redirect($approval_link);
      // }
      return view('paypal.pay',compact('plan','product_name','product_price','plan_id'));
      
  }

  public function paypalCheckoutInit(Request $request){
      $order_id = $request->order_id;
      $subscription_id = $request->subscription_id;
      $db_plan_id = $request->plan_id;
      $paypalSub = new PayPalSubscriptionAPI();
      try {  
        $subscr_data = $paypalSub->getSubscription($subscription_id);  
      } catch(Exception $e) {   
        $api_error = $e->getMessage();   
      }
      
      if(!empty($subscr_data)){  
        $status = $subscr_data['status'];  
        $subscr_id = $subscr_data['id'];  
        $plan_id = $subscr_data['plan_id'];  
        $custom_user_id = $subscr_data['custom_id']; 
 
        $create_time = $subscr_data['create_time'];  
        $dt = new DateTime($create_time);  
        $created = $dt->format("Y-m-d H:i:s"); 
         
        $start_time = $subscr_data['start_time'];  
        $dt = new DateTime($start_time);  
        $valid_from = $dt->format("Y-m-d H:i:s"); 
 
        if(!empty($subscr_data['subscriber'])){ 
            $subscriber = $subscr_data['subscriber']; 
            $subscriber_email = $subscriber['email_address']; 
            $subscriber_id = $subscriber['payer_id']; 
            $given_name = trim($subscriber['name']['given_name']); 
            $surname = trim($subscriber['name']['surname']); 
            $subscriber_name = trim($given_name.' '.$surname);  
        } 
 
        if(!empty($subscr_data['billing_info'])){ 
            $billing_info = $subscr_data['billing_info']; 
 
            if(!empty($billing_info['outstanding_balance'])){ 
                $outstanding_balance_value = $billing_info['outstanding_balance']['value']; 
                $outstanding_balance_curreny = $billing_info['outstanding_balance']['currency_code']; 
            } 
 
            if(!empty($billing_info['last_payment'])){ 
                $last_payment_amount = $billing_info['last_payment']['amount']['value']; 
                $last_payment_curreny = $billing_info['last_payment']['amount']['currency_code']; 
            } 
 
            $next_billing_time = $billing_info['next_billing_time']; 
            $dt = new DateTime($next_billing_time);  
            $valid_to = $dt->format("Y-m-d H:i:s"); 
        } 
  
        if(!empty($subscr_id) && $status == 'ACTIVE'){  
            // Check if any subscription data exists with the same ID  
            $user_subscription = UserSubscription::where('paypal_order_id',$order_id)->first();
              
            $payment_id = 0;  
            if($user_subscription != null){  
                $payment_id = $user_subscription->id; 
            }else{  
                // Insert subscription data into the database 
                $user_subscription_create = UserSubscription::create([
                  'user_id' => $custom_user_id,  
                  'plan_id' =>$db_plan_id,
                  'paypal_order_id' =>$order_id, 
                  'paypal_plan_id' =>$plan_id, 
                  'paypal_subscr_id' =>$subscr_id, 
                  'valid_from' =>$valid_from, 
                  'valid_to' =>$valid_to, 
                  'paid_amount' =>$last_payment_amount, 
                  'currency_code' =>$last_payment_curreny,
                  'subscriber_id' => $subscriber_id, 
                  'subscriber_name' =>$subscriber_name, 
                  'subscriber_email' =>$subscriber_email,
                  'status' => $status,
                  'created' => $created,
                  'modified' =>NOW()
                ]);

                $user_subscription_id = $user_subscription_create->id;  
                
                    // Update subscription ID in users table  
                $sqlQ = "UPDATE users SET subscription_id=? WHERE id=?";  
                $stmt = $db->prepare($sqlQ);  
                $stmt->bind_param("ii", $user_subscription_id, $custom_user_id);  
                $update = $stmt->execute();  
                
                  
                if($insert){  
                    
                }  
            }  
  
            if(!empty($user_subscription_id)){  
                $ref_id_enc = base64_encode($order_id);  
                $response = array('status' => 1, 'msg' => 'Subscription created!', 'ref_id' => $ref_id_enc);  
            }  
        } 
    }else{  
        $response['msg'] = $api_error;  
    }  
  }

  public function createProduct(){
    $create_product = $this->createProductApi('aaaa');
    return $create_product;
  }
  
//   public function createPlan(){
//     $create_product = $this->createPlanApi('1709844616','Ramadan','Test Desc','MONTH',888);
//     return $create_product;
//   }
  
  public function createPlan(){
    $plan = new SubscriptionPlan();
    $result = $plan->create('aa','aa',100);
    return $result->id;
  }
  
  public function allPlans(){
    $plan = new SubscriptionPlan();
    return $plan->listPlans();
  }
  
  public function planDetails($id){
    $plan = new SubscriptionPlan();
    $planDetails = $plan->planDetails($id);
    return $planDetails;
  }
  
  public function createAgreement($id){
    $agreement = new PayPalAgreement();
    return $agreement->create('Plan Agreement','Plan Agreement',$id);
  }
  
  public function executeAgreement($status,$plan_id,$user_id){
    if ($status == 'true') {
        UserPlan::create([
            'plan_id' => $plan_id,
            'user_id' => $user_id,
            'publish' => 1,
        ]);

        return redirect('https://google.com');
    }else{
        return redirect('https://youtube.com');
    }
  }
  


  
}

