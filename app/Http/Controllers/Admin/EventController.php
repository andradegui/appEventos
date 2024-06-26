<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    use UploadTrait;
    private $event;

    public function __construct(Event $event){

        $this->event = $event;

        $this->middleware('user.can.event.edit')->only('update');

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

        $categories = Category::all(['id', 'name']);

        return view('admin.events.create', compact('categories'));

    }

    public function store(EventRequest $request){

        $event = $request->all();

        // Se o request de banner estiver preechido
        if(  $banner = $request->file('banner') ){

            // Salva img
            $event['banner'] = $this->upload($banner, 'events/banner');

        }       

        // No momento o slug está sendo pego pela método setTitleAttribute na model de Event

        $event = $this->event->create($event);

        // Configuração p/ salvar usuário que é dono do evento
        $event->owner()->associate(auth()->user());
        $event->save();

        if( $categories = $request->get('categories') ){

            $event->categories()->sync($categories);

        }

        return redirect()->route('admin.events.index');

    }

    public function edit(Event $event){

        // $event = $this->event->findOrFail($event);

        $categories = Category::all(['id', 'name']);

        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Event $event, EventRequest $request){

        // $event = $this->event->findOrFail($event);

        $eventData = $request->all();

        if(  $banner = $request->file('banner') ){

            if( Storage::disk('public')->exists($event->banner) ){

                Storage::disk('public')->delete($event->banner);

            }

            // Salva img
            $eventData['banner'] = $this->upload($banner, 'events/banner');

        }

        $event->update($eventData);

        if( $categories = $request->get('categories') ){

            $event->categories()->sync($categories);

        }

        return redirect()->back();
        
    }

    public function destroy(Event $event){
        
        // $event = $this->event->findOrFail($event);

        $event->delete();

        return redirect()->route('admin.events.index');

    }
}
