@extends('layouts.site')

@section('title')

    Evento : {{ $event->title }}    

@endsection

@section('content')

    <div class="row justify-content-between align-items-center">
        
        <div class="col-10 my-5">
            
            <h2>Evento :  {{ $event->title }}</h2>
            
            <p> Evento acontecerá em: {{ $event->start_event->format('d/m/Y H:i:s') }} </p>
            
        </div>

        <a href="{{route('index')}}" class="btn btn-dark">Voltar</a>        

    </div>

    <div class="row">

        <div class="col-12">            

            <ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">

                  <a class="nav-link active text-dark" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Sobre</a>

                </li>

                @if( $event->photos->count() )
                    <li class="nav-item" role="presentation">
                        
                    <a class="nav-link text-dark" id="photo-tab" data-toggle="tab" href="#photo" role="tab" aria-controls="photo" aria-selected="false">Fotos</a>

                    </li>
                @endif

                </ul>

              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active pt-5" id="about" role="tabpanel" aria-labelledby="about-tab">

                    {{ $event->body }}

                </div>

                @if( $event->photos->count() )
                    <div class="tab-pane fade pt-5" id="photo" role="tabpanel" aria-labelledby="photo-tab">

                        <div class="row">

                            @foreach($event->photos as $photo) 

                                <div class="col-3">

                                    <img src="{{ $photo->photo }}" alt="Foto do evento {{ $event->title }}" class="img-fluid">

                                </div>

                            @endforeach 

                        </div>                    

                    </div>
                @endif

              </div>

        </div>


    </div>

@endsection