<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Asset;

class CourseController extends Controller
{
    
function index($type,$course,$session) {
    $courses = Course::where('type',$type)->where('status','published');
    // dd(auth()->user()->purchasedCourses()->get());
    // dd($courses);
    if(auth()->user()){
        $usersCourse = auth()->user()->purchasedCourses()->pluck('course_id')->toArray();
    }
        
    
    // dd($usersCourse);
    // $courses = $courses->whereIn('id', $usersCourse)->get();
    // dd($coursesBought);
    if($session!=null){
        $course = Course::where('type',$type)->where('slug',$course)->first();
        $session = $course->assets()->where('slug',$session)->first();
        return view('page.session',['session'=>$session,'course'=>$course]);
    }
    
    if($course!=null){
        $course = Course::where('type',$type)->where('slug',$course)->first();
        return view('page.courses',['course'=>$course]);
    }
    
    return view('page.courses',['courses'=>$courses->get()]);
}

    function player($session) 
    {
    }
}
