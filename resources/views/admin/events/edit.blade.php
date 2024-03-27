@extends('layouts.app')

@section ('title') Editar evento @endsection

@section('content')


    <div class="row justify-content-between align-items-center">

        <div class="col-6 my-5">

            <h2>Editar evento</h2>

            
        </div>
        
        <a href="/admin/events/index" class="btn btn-dark">Voltar</a>     

        
    </div>

    <div class="row">

        <div class="col-12">

            
            <form action="/admin/events/update/{{ $event->id }}" method="post">
                
                @csrf

                {{-- Nome Evento --}}
                <div class="form-group">
    
                    <label for="">Nome evento:</label>
                    <input name="title" id="title" type="text" class="form-control" value="{{ $event->title }}">

                </div>

                {{-- Descrição --}}
                <div class="form-group">

                    <label for="">Descrição:</label>
                    <input name="description" id="description" type="text" class="form-control" value="{{ $event->description }}">

                </div>      

                 {{-- Body --}}
                <div class="form-group">
                    
                    <label for="">Fale + sobre as atrações evento:</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $event->body }}</textarea>

                </div>    

                 {{-- Start_event --}}
                <div class="form-group">

                    <label for="">Quando vai acontecer?</label>
                    <input name="start_event" id="start_event" type="text" class="form-control" value="{{ $event->start_event }}">
                    
                </div>    
        
                <button type="submit" class="btn btn-success my-2">Atualizar Evento</button>

            </form>

        </div>

    </div>


@endsection