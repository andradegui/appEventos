<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){

        $events = Event::all();

        return view('admin.events.index', compact('events'));

    }

    public function store(){

         $event = [
            'title' => 'Evento via AS ' . rand(1, 100),
            'description' => 'Descrição evento...',
            'body' => 'Conteúdo evento...',
            'start_event' => date('Y-m-d H:i:s'),
            'slug' => 'evento-via-as',
        ];
        

        return Event::create($event);

    }

    public function update($event){

        // Atualizando com Mass Assignment
        $eventData = [
            'title' => 'Atualizando Evento via AS '. rand(1, 100),
            // 'description' => 'Descrição evento...',
            // 'body' => 'Conteúdo evento...',
            // 'start_event' => date('Y-m-d H:i:s'),
            // 'slug' => 'atualizando-evento-via-as',
        ];

        $event = Event::find($event);
        $event->update($eventData);
        return $event;
        
    }

    public function destroy($event){
        
        $eventSearch = Event::findOrFail($event);    
        return $eventSearch->delete();

    }
}
