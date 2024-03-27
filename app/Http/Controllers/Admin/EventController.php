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

        $event = Event::findOrFail($event);

        $event->update(request()->all());

        return redirect()->back();
        
    }

    public function destroy($event){
        
        $event = Event::findOrFail($event);

        $event->delete();

        return redirect()->to('/admin/events/index');

    }
}
