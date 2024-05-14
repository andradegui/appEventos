<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventPhotoRequest;

class EventPhotoController extends Controller
{
    use UploadTrait;

    public function __construct(){

        $this->middleware('user.can.event.edit');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {   
        // $event = Event::find($event);
        return view ('admin.events.photos', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventPhotoRequest $request, Event $event)
    {

        // Validação p/ caso o usuário tentar fazer clicar em Salvar foto(s) sem nenhum arquivo
        if( $request ){

            return redirect()->back();

        }

        $uploadedPhotos = $this->multipleFilesUploads($request->file('photos'), 'events/photos', 'photo');

        $event->photos()->createMany($uploadedPhotos);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $photo)
    {
        
        $photo = $event->photos()->find($photo);

        if( !$photo ){

            return redirect()->route('admin.events.index');

        }

        if( Storage::disk('public')->exists($photo->photo) ){

            Storage::disk('public')->delete($photo->photo);

        }

        $photo->delete();

        return redirect()->back();

    }
}
