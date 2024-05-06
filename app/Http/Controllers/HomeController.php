<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function __construct(Event $event){

        $this->event = $event;

    }

    public function index(){

        $events = $this->event->orderBy('start_event', 'DESC')->paginate(10);
        // $events = [];

        // return view('welcome', ['events' => $events]);
        return view('home', compact('events'));

    }

    public function show($slug){
        
        $event = $this->whereSlug($slug)->first();
        return view('event', compact('event'));

    }

}
