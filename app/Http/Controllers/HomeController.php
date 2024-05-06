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

        $events = $this->event->orderBy('start_event', 'DESC');

        if( $query = request()->query('s') ){

            $events->where('title', 'LIKE', '%' . $query . '%');

        }

        $events = $events->paginate(10);
        
        return view('home', compact('events'));

    }

    public function show($slug){
        
        $event = $this->whereSlug($slug)->first();
        return view('event', compact('event'));

    }

}
