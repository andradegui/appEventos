@extends('layouts.site')

@section('title')

    Principais Eventos

@endsection

@section('content')

    <div class="row">

        <div class="col-12 my-5">

            <h2>Eventos</h2>

            <hr>

        </div>

    </div>

    <div class="row mb-4">
    
        @forelse( $events as $event )

            <div class="col-4">

                <div class="card">

                    <img src="https://via.placeholder.com/640x480.png/20co50?text=Sem%20Imagem" alt="" class="card-img-top">

                    <div class="card-body">

                        <h5 class="card-title">{{ $event->title }}</h5>
    
                        <strong>Acontece em: {{ $event->start_event->format('d/m/Y H:i:s') }}</strong>
    
                        <p class="card-text">{{ $event->description }}</p>

                        <a href="{{route('event.single', ['slug' => $event->slug])}}" class="btn btn-dark">Ver Evento</a>

                    </div>

                </div>

            </div>

            {{-- Fazendo tratamento que p/ cada 3 eventos seja criado uma nova div p/ agrupamento --}}
            @if( ($loop->iteration % 3) == 0 ) <div class="row mb-4"></div> @endif 

        @empty

            <div class="col-12">
                <div class="alert alert-warning">
                    Nenhum evento encontrado...
                </div>
            </div>

        @endforelse

    </div>


@endsection