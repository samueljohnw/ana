<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    function purchase($product_id, Request $request ) {

        dd(auth()->user());
        $purchase = new Purchase;
        $purchase->user_id = auth()->user();
        $purchase->course_id = 2;
        $purchase->product_id = $product_id;
        $purchase->save();
 
        return redirect('welcome');
    }

    function seerschool(){}
    function healingschoool(){}
    function ecourse() {}
}
