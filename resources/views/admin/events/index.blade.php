@extends('layouts.app')

@section('title') Meus Eventos - @endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <table class="table table-striped">
        
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Evento</th>
                        <th>Criado Em</th>
                    </tr>
                </thead>
        
                <tbody>
        
                    @forelse( $events as $event )
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->created_at }}</td>
                        </tr>
        
                        @empty
                        <tr>
                            <td colspan="3">Nenhum evento encontrado...</td>
                        </tr>
        
                    @endforelse
        
                </tbody>
        
            </table>

            {{ $events->links() }}

        </div>

    </div>


@endsection