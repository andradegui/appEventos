@extends('layouts.site')

@section('content')

    <div class="row">

        <div class="col-12">

            <h2>Confirmação de ingresso</h2>
            <hr>

        </div>

    </div>

    <div class="row">

        <div class="col-12">

            <p>
                <strong>Evento: {{$event->title}}</strong>
            </p>

            <p>
                <strong>Dia: {{$event->start_event->format('d/m/Y H:i')}}</strong>
            </p>

            <div>
                
                <a href="{{route('enrollment.proccess')}}" class="btn btn-success">Confirmar</a>
            
            </div>

        </div>

    </div>

@endsection