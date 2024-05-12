@extends('layouts.app')

@section ('title') Fotos do evento @endsection

@section('content')

    <div class="row justify-content-between align-items-center">

        <div class="col-6 my-5">

            <h2>Foto(s) evento</h2>

        </div>
        
        <a href="{{route('admin.events.index')}}" class="btn btn-dark">Voltar</a>     
        
    </div>

    <div class="row">

        <div class="col-12">

            <form action="{{route('admin.events.photos.store', $event)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <label>Cadastrar fotos do evento:</label>
                    <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>

                    @error('photos.*')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror


                </div>

                <button class="btn btn-success">Salvar fotos</button>

            </form>

            <hr>
            
        </div>

    </div>

    <div class="row mb-5">

        @forelse( $event->photos as $photo )

            <div class="col-4 text-center">

                <img src="{{asset('storage/' . $photo->photo)}}" alt="Fotos do evento" class="img-fluid img-thumbnail">

                <form action="{{route('admin.events.photos.destroy', [$event, $photo])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mt-2">Remover</button>
                </form>

            </div>

        @empty

            <div class="col-12 mb-4">

                <strong class="alert alert-warning">Evento sem foto(s)...</strong>

            </div>

        @endforelse

    </div>

@endsection