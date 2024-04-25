<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    private $event;


    public function __construct(Event $event){

        $this->event = $event;

    }

    public function index(){

        // Lista apenas os eventos do usuário logado
        $events = auth()->user()->events()->paginate(10);

        return view('admin.events.index', compact('events'));

    }

    public function show($event){

        return 'Evento: ' . $event;

    }

    public function create(){

        return view('admin.events.create');

    }

    public function store(EventRequest $request){

        $event = $request->all();

        // Configuração p/ pegar o slug p/ colocar na ULR
        $event['slug'] = Str::slug($event['title']);

        $event = $this->event->create($event);

        // Configuração p/ salvar usuário que é dono do evento
        $event->owner()->associate(auth()->user());
        $event->save();

        return redirect()->route('admin.events.index');

    }

    public function edit($event){

        $event = $this->event->findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update($event, EventRequest $request){

        $event = $this->event->findOrFail($event);

        $event->update($request->all());

        return redirect()->back();
        
    }

    public function destroy($event){
        
        $event = $this->event->findOrFail($event);

        $event->delete();

        return redirect()->route('admin.events.index');

    }
}
