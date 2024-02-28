<h2>Eventos</h2>

<hr>

@forelse($events as $event)

    <li>{{ $event->title }}</li>

@empty
    
    <h3>Nenhum evento encontrado...</h3>

@endforelse