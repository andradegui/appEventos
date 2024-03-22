<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){

        // $events = Event::all();
        $events = Event::paginate(10);

        return view('admin.events.index', compact('events'));

    }

    public function create(){

        return view('admin.events.create');

    }

    public function store(){

        $event = request()->all();

        // Configuração p/ pegar o slug p/ colocar na ULR
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->to('/admin/events/index');

    }

    public function edit($event){

        $event = Event::findOrFail($event);

        return view('admin.events.edit', compact('event'));
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
