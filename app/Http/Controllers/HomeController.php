<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Event $event){

        $this->event = $event;

    }

    public function index(){

        $slug = request()->get('category');

        $byCategory = request()->has('category') ? Category::whereSlug($slug)->first()->events() : null;

        $events = $this->event->getEventsHome($byCategory)->paginate(10);        
        
        return view('home', compact('events'));

    }

    public function show(Event $event){
        
        // $event = $this->event->whereSlug($event)->first();
        return view('event', compact('event'));

    }

}
