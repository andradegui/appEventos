<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventPhotoController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/eventos/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('event.single');

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function(){

    Route::resource('events', EventController::class);
    Route::resource('events.photos', EventPhotoController::class);

});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('index');

// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/queries/{event?}', function ($event = null) {

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

// });
