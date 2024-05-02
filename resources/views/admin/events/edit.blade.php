@extends('layouts.app')

@section ('title') Editar evento @endsection

@section('content')


    <div class="row justify-content-between align-items-center">

        <div class="col-6 my-5">

            <h2>Editar evento</h2>

            
        </div>
        
        <a href="{{route('admin.events.index')}}" class="btn btn-dark">Voltar</a>     
        
    </div>

    <div class="row">

        <div class="col-12">

            
            <form action="{{route('admin.events.update', ['event' => $event->id])}}" method="post">
                
                @csrf
                @method('PUT')

                {{-- Nome Evento --}}
                <div class="form-group">
    
                    <label for="">Nome evento:</label>
                    <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $event->title }}">

                    @error('title')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror

                </div>

                {{-- Descrição --}}
                <div class="form-group">

                    <label for="">Descrição:</label>
                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{ $event->description }}">

                    @error('description')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror


                </div>      

                 {{-- Body --}}
                <div class="form-group">
                    
                    <label for="">Fale + sobre as atrações evento:</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ $event->body }}</textarea>

                    @error('body')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror

                </div>    

                 {{-- Start_event --}}
                <div class="form-group">

                    <label for="">Quando vai acontecer?</label>
                    <input name="start_event" id="start_event" type="text" class="form-control @error('start_event') is-invalid @enderror" value="{{ $event->start_event->format('d/m/Y H:i:s') }}">
                    
                    @error('start_event')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror                    

                </div>    
        
                <button type="submit" class="btn btn-success my-2">Atualizar Evento</button>

            </form>

        </div>

    </div>


@endsection

@section('scripts')

    <script>

        // import '/../resources/js/bootstrap.js';

        let el = document.querySelector('input[name=start_event]');

        let im = new Inputmask('99/99/9999 99:99:99');

        im.mask(el);

    </script>

@endsection