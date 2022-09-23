<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserOrder;
use Victorybiz\LaravelCryptoPaymentGateway\LaravelCryptoPaymentGateway;

class PaymentController extends Controller
{
    //...
    
    /**
     * Cryptobox IPN Example
     * 
     * @param \Victorybiz\LaravelCryptoPaymentGateway\Models\CryptoPaymentModel $cryptoPaymentModel
     * @param array $payment_details
     * @param string $box_status
     * @return bool
     */
    
    public function callback(Request $request)
    {   
      return LaravelCryptoPaymentGateway::callback();
    }
    
    
     public static function ipn($cryptoPaymentModel, $payment_details, $box_status)
    {            
        if ($cryptoPaymentModel) {  
           
            $userOrder = UserOrder::where('payment_id', $cryptoPaymentModel->paymentID)->first();
            if (!$userOrder) 
            {
                UserOrder::create([
                    'payment_id' => $cryptoPaymentModel->paymentID,
                    'user_id'    => $payment_details["user"],
                    'order_id'   => $payment_details["order"],
                    'amount'     => floatval($payment_details["amount"]),
                    'amountusd'  => floatval($payment_details["amountusd"]),
                    'coinlabel'  => $payment_details["coinlabel"],
                    'txconfirmed'  => $payment_details["confirmed"],
                    'status'     => $payment_details["status"],
                ]);
            }
           

            // Received second IPN notification (optional) - Bitcoin payment confirmed (6+ transaction confirmations)
            if ($userOrder && $box_status == "cryptobox_updated")
            {
                $userOrder->txconfirmed = $payment_details["confirmed"];
                $userOrder->save();
            }
            

            // Onetime action when payment confirmed (6+ transaction confirmations)
            if (!$cryptoPaymentModel->processed && $payment_details["confirmed"])
            {
                
                $cryptoPaymentModel->setStatusAsProcessed();

           
            }
            
        }
        return true;
    }
}