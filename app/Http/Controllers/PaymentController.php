<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use Auth;
 
class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }
 
    public function charge(Request $request)
    {
        if ($request->input('stripeToken')) {
  
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));
          
            $token = $request->input('stripeToken');
          
            $response = $gateway->purchase([
                'amount' => 50,
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();
          
            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();
                 
                $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();
          
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->user_id = Auth::id();
                    $payment->payer_email = Auth::user()->email;
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();
                    
                    if($payment->payment_status == "succeeded")
                    {
                        Payment::where('payment_id', '!=', $payment->payment_id)->where('payer_email',$payment->payer_email)->update(['active' =>0]);
                        return redirect()->route('confirmPayment');
                    }

                }
 
                // return "Payment is successful. Your payment id is: ". $arr_payment_data['id'];
            } else {
                // payment failed: display message to customer
                return $response->getMessage();
            }
        }
    }
}