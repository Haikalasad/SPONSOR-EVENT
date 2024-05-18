<?php

namespace App\Http\Controllers;


use App\Models\Event;


class HomeController extends Controller
{

    public function showHome()
    {
        $events = Event::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('events'));
    }
    
}
