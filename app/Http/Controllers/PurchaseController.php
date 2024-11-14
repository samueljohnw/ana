<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    function purchase($product_id, Request $request ) {
       // dd($request->user()->checkout('price_1QGwJO4t1cavPEy4uVJOG9dB'));
        // return $request->user()->checkout('price_1QGwJO4t1cavPEy4uVJOG9dB');
        {
            $plan = Plan::findOrFail($request->get('plan'));
    
            if($request->user()->subscribedToPlan($plan->stripe_plan, $plan->name)) {
                
                $notification = [
                    'type' => 'error',
                    'message' => 'You are already subscribed to this plan!',
                ];
            } else {
            
                $request->user()
                    ->newSubscription($plan->name, $plan->stripe_plan)
                    ->create($request->stripeToken);
    
                $notification = [
                    'type' => 'success',
                    'message' => 'Successfully subscribed to ' . $plan->name . ' plan!',
                ];
        }
    
            return redirect(route('page.landing.seerschool'))->with($notification);
        }
        
    }

    function seerschool(){}
    function healingschoool(){}
    function ecourse() {}
}
