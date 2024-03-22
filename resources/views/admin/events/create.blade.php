@extends('layouts.app')

@section ('title') Criar evento @endsection

@section('content')


    <div class="row">

        <div class="col-12 my-5">

            <h2>Criar evento</h2>

        </div>

    </div>

    <div class="row">

        <div class="col-12">

            
            <form action="/admin/events/store" method="post">
                
                @csrf

                <div class="form-group">
    
                    <label for="">Nome evento:</label>
                    <input name="title" id="title" type="text" class="form-control">

                </div>

                <div class="form-group">

                    <label for="">Descrição:</label>
                    <input name="description" id="description" type="text" class="form-control">

                </div>      

                <div class="form-group">
                    
                    <label for="">Fale + sobre as atrações evento:</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>

                </div>    

                <div class="form-group">

                    <label for="">Quando vai acontecer?</label>
                    <input name="start_event" id="start_event" type="text" class="form-control">
                    
                </div>    
        
                <button type="submit" class="btn btn-success my-2">Criar Evento</button>

            </form>

        </div>

    </div>


@endsection