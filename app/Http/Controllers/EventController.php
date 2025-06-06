<?php

namespace App\Http\Controllers;

use App\Models\Event as Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();
        return view('page.events',['events'=>$events,'card'=>1]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventController $eventController, $id)
    {
        $event = Events::find($id);
        return view('page.event-detail',['event'=>$event,'card'=>1]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventController $eventController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventController $eventController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventController $eventController)
    {
        //
    }
}
