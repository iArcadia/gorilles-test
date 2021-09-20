@extends('_layout.master')

@section('title', 'Fiche événement - ' . $event->title)

@section('content')
<table>
    <tbody>
        <tr>
            <th>Intitulé</th>
            <td>{{ $event->title }}</td>
        </tr>
        
        <tr>
            <th>Nombre de places</th>
            <td>{{ $event->maximum_places }}</td>
        </tr>
        
        <tr>
            <th>Débute le</th>
            <td>{{ $event->start_at->format('d/m/Y') }}</td>
        </tr>
    </tbody>
</table>

<a href="{{ route('event.index') }}">Retour</a>
<a href="{{ route('event.edit', $event) }}">Modifier</a>
<a id="delete-link" href="{{ route('event.destroy') }}" data-id="{{ $event->id }}">Supprimer</a>

<h2>Réservations</h2>

@if ($event->users->count())
<table>
    <thead>
        <tr>
            <th>Utilisateur</th>
            <th>Réservé le</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($event->users as $user)
        <tr>
            <td>{{ $user->complete_name }}</td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('user.show', $user) }}">Fiche</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<i>Aucune réservation...</i>
@endif
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // When the delete link is clicked, ask confirmation first.
        // Then, if confirmed, call the API to (soft) delete the event and all its
        // reservations. Finally, redirect the client to the event list.
        $('#delete-link').on('click', function(e) {
            e.preventDefault();
            
            const self = this,
                confirmation = window.confirm('Êtes-vous sûr de supprimer cet événement ?');
            
            if (confirmation) {
                const eventId = +$(self).data('id'),
                    data = {
                        id: eventId
                    };
                
                $.ajax({
                    url: $(self).attr('href'),
                    type: 'DELETE',
                    data: data,
                    success: data => {
                        window.location.replace(`{{ url('/') }}/event`);
                    }
                });
            } 
        });
    });
</script>
@endsection