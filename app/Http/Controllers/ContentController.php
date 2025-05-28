<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use App\Models\Slide;
use Stripe\Stripe;


class ContentController extends Controller
{
    function home() {
        $events = Event::all(); 
        $sliders = Slide::all();

        return view('home', [
            'events' => $events,
            'card' => 1,
            'sliders' => $sliders
        ]);  
    }

    function about() {
        return view('page.about');  
    }

    function books() {
        return view('page.books');  
    }

    function training() {
        return view('page.training');  
    }

    function course(string $type, string $course =null, string $session=null)  {
        $courseController = new CourseController;
        return $courseController->index($type,$course,$session);
    }

    function eaglesnetwork() {
        return view('page.eaglesnetwork');  
    }
    function seerschool() {
        
        $course = Course::where('status','published')->where('id',20)->first();

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a SetupIntent
        $setupIntent = \Stripe\SetupIntent::create();

        return view('page.landing.seerschool',['course'=>$course,'clientSecret'=>$setupIntent->client_secret]);  
    }

    function success(Request $request) {

        if (!$request->has('session_id')) {
            return redirect()->route('page.home');
        }
        
        $sessionId = $request->get('session_id');
        if ($sessionId === null) {return;}

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        if ($session->payment_status !== 'paid') {return;}
        
        $priceId = $session['metadata']['price_id'] ?? null;
        if ($priceId === null) {return;}   
        
        $course = Course::where('price_id',$priceId)->get();

        return 'success';
    }

    function cancel() {

        return 'fail';
    }

    function welcome(){
        return view('page.welcome');  

    }
}
