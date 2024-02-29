@extends('layouts.site')

@section('title')

    Principais Eventos

@endsection

@section('content')

    <h2>Eventos</h2>

    <hr>

    <ul>

        @forelse($events as $event)

            <li>
                <strong>
                    {{ $event->title }}
                </strong>
            </li>

        @empty
            
            <h3>Nenhum evento encontrado...</h3>

        @endforelse

    </ul>

@endsection