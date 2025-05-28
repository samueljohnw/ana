<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Course;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\PaymentIntent;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    // protected $id = 1;

    function show($id, Request $request){
        $course = Course::find($id);

        return $request->user()->checkout($course->price_id, [
        'success_url' => route('page.success').'?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('page.cancel'),
        'metadata' => ['price_id' => $course->price_id,'user_id' => $request->user()->id],
    ]);
       
        // return view('page.landing.payment',['course'=>$course]);

    }
    
    function singlePurchase(Request $request){
        dd($request->all());
        //     return $request->user()->checkout($order->price_ids, [

        //     'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}',

        //     'cancel_url' => route('checkout-cancel'),

        //     'metadata' => ['order_id' => $order->id],

        // ]);
    }

    // function singlePurchase(Request $request){

    //     $course = Course::find($request->id);

    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //         try {
    //             // Retrieve or Create Customer by Email
    //             $existingCustomer = Customer::all(['email' => $request->email, 'limit' => 1])->data[0] ?? null;
            
    //             if ($existingCustomer) {
    //                 $customer = $existingCustomer;
            
    //                 // Attach the PaymentMethod to the existing Customer
    //                 $paymentMethod = PaymentMethod::retrieve($request->pm['id']);
    //                 $paymentMethod->attach(['customer' => $customer->id]);
    //             } else {
    //                 // Create a new Customer with the provided PaymentMethod
    //                 $customer = Customer::create([
    //                     'email' => $request->email,
    //                     'payment_method' => $request->pm['id'],
    //                 ]);
    //             }
            
    //             // Create and Confirm a PaymentIntent
    //             $paymentIntent = PaymentIntent::create([
    //                 'amount' => $course->price*100, // Amount in cents ($23.00)
    //                 'currency' => 'usd',
    //                 'payment_method' => $request->pm['id'],
    //                 'description' => $course->title. ' - Ana Werner Ministries',
    //                 'receipt_email' => $request->email,
    //                 'customer' => $customer->id, // Associate with the Customer
    //                 'confirm' => true, // Automatically confirm the PaymentIntent
    //                 'return_url' => env('APP_URL').'/seer-school',

    //             ]);
    //             // dd($paymentIntent);
    //             // Upon Successful Stripe Payment Record the Users Information In the App
    //             // Create User if Doesn't Exists
    //             $user = User::firstOrNew(['email' =>  $request->email]);
    //             $user->name = $request->name;
    //             $user->save();
                
    //             // Attach course to user with additional pivot data
    //             $user->course()->syncWithoutDetaching([
    //                 $course->id => ['ch_id' => $paymentIntent->latest_charge],
    //             ]);

    //             return response()->json(['status' => 'success', 'paymentIntent' => $paymentIntent]);
    //         } catch (\Stripe\Exception\CardException $e) {
    //             // Handle card-related errors
    //             return response()->json(['status' => 'error', 'message' => $e->getError()->message]);
    //         } catch (\Exception $e) {
    //             // Handle other errors
    //             return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //         }

    // }

}
