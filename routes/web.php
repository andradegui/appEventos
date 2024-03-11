<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);

Route::get('/eventos/{slug}', [\App\Http\Controllers\Admin\HomeController::class, 'show']);

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/queries/{event?}', function ($event = null) {

    // $events = \App\Models\Event::all();

    // Inserindo com Active Record
    // $event = new \App\Models\Event();
    // $event->title = 'Evento 4 via Eloquent AR';
    // $event->description = 'Descrição evento';
    // $event->body = 'Conteúdo evento.....';
    // $event->start_event = date('Y-m-d H:i:s');
    // $event->slug = \Illuminate\Support\Str::slug($event->title);

    // return $event->save();

    // Atualizando com Active Record
    // $event = \App\Models\Event::find(12);
    // $event->title = 'Evento Atualizado via Eloquent AR';
    // $event->slug = \Illuminate\Support\Str::slug($event->title);

    // return $event->save();

    // return $event;

    // Inserindo com Mass Assignment
    // $event = [
    //     'title' => 'Evento via AS',
    //     'description' => 'Descrição evento...',
    //     'body' => 'Conteúdo evento...',
    //     'start_event' => date('Y-m-d H:i:s'),
    //     'slug' => 'evento-via-as',
    // ];

    // return \App\Models\Event::create($event);

    // return $event;

    // Atualizando com Mass Assignment
    // $eventData = [
    //     'title' => 'Atualizando Evento via AS',
    //     'slug' => 'atualizando-evento-via-as',
    // ];

    // $event = \App\Models\Event::find(13);
    // $event->update($eventData);

    // return $event;

    // Removendo via busca do model
    // $event = \App\Models\Event::find(14);
    // $event = \App\Models\Event::findOrFail(14);
    
    // return $event->delete();

    // Removendo vários ids
    // return \App\Models\Event::destroy([15, 16, 17]);

    // Buscando dados com o Eloquent
    // return \App\Models\Event::orderBy('id', 'DESC')->limit(3)->get();

});

Route::get('/admin/events/index', [\App\Http\Controllers\Admin\EventController::class, 'index']);
Route::get('/admin/events/store', [\App\Http\Controllers\Admin\EventController::class, 'store']);
Route::get('/admin/events/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update']);
Route::get('/admin/events/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy']);

