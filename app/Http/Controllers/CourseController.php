<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Asset;

class CourseController extends Controller
{
    
function index($type,$course,$session) {
    $courses = Course::where('type',$type)->where('status','published')->get();

    if($session!=null){
        $course = Course::where('type',$type)->where('slug',$course)->first();
        $session = $course->assets()->where('slug',$session)->first();
        return view('page.session',['session'=>$session,'course'=>$course]);
    }
    
    if($course!=null){
        $course = Course::where('type',$type)->where('slug',$course)->first();
        return view('page.courses',['course'=>$course]);
    }
    
    return view('page.courses',['courses'=>$courses]);
}

    function player($session) 
    {
    }
}
