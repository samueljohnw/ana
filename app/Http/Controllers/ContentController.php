<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\CourseController;

class ContentController extends Controller
{
    function home() {
        $events = Event::all(); 
        return view('home', [
            'events' => $events,
            'card' => 1
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
}
