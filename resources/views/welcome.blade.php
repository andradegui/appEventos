<h2>Eventos</h2>

<hr>

@if( count($events) )

    <ul>
    
    @foreach( $events as $event )
        
        <li>{{ $event->title }}</li>
        
    @endforeach

    </ul>

@else

    <h3>Nenhum evento encontrado...</h3>

@endif