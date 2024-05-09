@extends('layouts.app')

@section ('title') Criar evento @endsection

@section('content')


    <div class="row justify-content-between align-items-center">

        <div class="col-6 my-5">

            <h2>Criar evento</h2>

        </div>

        <a href="{{route('admin.events.index')}}" class="btn btn-dark">Voltar</a>

    </div>

    {{-- @dd($errors); --}}
    {{-- @dump($errors-); --}}
    {{-- @dump($errors->all()); --}}

    {{-- @if( $errors->any() )

        <div class="alert alert-danger">

            <ul>

            @foreach( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach

            </ul>

        </div>

    @endif --}}

    <div class="row">

        <div class="col-12">
            
            <form action="{{route('admin.events.store')}}" method="post" enctype="multipart/form-data">
                
                @csrf

                <div class="form-group">

                    {{-- Nome Evento --}}
                    <label for="">Nome evento:</label>
                    <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">

                    @error('title')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror

                </div>

                {{-- Descrição --}}
                <div class="form-group">

                    <label for="">Descrição:</label>
                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">

                    @error('description')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror

                </div>

                {{-- Body --}}
                <div class="form-group">
                    
                    <label for="">Fale + sobre as atrações evento:</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{old('body')}}</textarea>

                    @error('body')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror

                </div>    

                {{-- Start_event --}}
                <div class="form-group">

                    <label for="">Quando vai acontecer?</label>
                    <input name="start_event" id="start_event" type="text" class="form-control @error('start_event') is-invalid @enderror" value="{{old('start_event')}}">

                    @error('start_event')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror
                    
                </div>
                
                <div class="form-group mb-4">

                    <label>Banner Evento:</label>
                    <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror">

                    @error('banner')

                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                    @enderror

                </div>
        
                <button type="submit" class="btn btn-success my-2">Criar Evento</button>

            </form>

        </div>

    </div>


@endsection


@section('scripts')

    <script>

        // import '/../resources/js/bootstrap.js';

        let el = document.querySelector('input[name=start_event]');

        let im = new Inputmask('99/99/9999 99:99');

        im.mask(el);

    </script>

@endsection