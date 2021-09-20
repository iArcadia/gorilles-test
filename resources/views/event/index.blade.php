@extends('_layout.master')

@section('title', 'Liste des événements')

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Intitulé</th>
            <th>Nombre de places</th>
            <th>Débute le</th>
            <th>Nombre de réservations</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->maximum_places }}</td>
            <td>{{ $event->start_at->format('d/m/Y') }}</td>
            <td>{{ $event->users()->count() }}</td>
            <td>
                <a href="{{ route('event.show', $event) }}">Voir</a>
                <a href="{{ route('event.edit', $event) }}">Modifier</a>
                <a href="{{ route('event.destroy', $event) }}" data-delete-event>Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // When the delete button of an event is clicked, ask confirmation first.
        // Then, if confirmed, call the API to (soft) delete the event and all his
        // reservations. Finally, reload the current page.
        $('a[data-delete-event]').on('click', function(e) {
            e.preventDefault();
            
            const self = this,
                confirmation = window.confirm('Êtes-vous sûr de supprimer cet événement ?');
            
            if (confirmation) {
                $.ajax({
                    url: $(self).attr('href'),
                    type: 'DELETE',
                    success: data => {
                        window.location.reload();
                    }
                });
            } 
        });
    });
</script>
@endsection