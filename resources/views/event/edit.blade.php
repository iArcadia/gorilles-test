@extends('_layout.master')

@section('title', 'Edition d\'une fiche événement - ' . $event->title)

@section('content')
<form id="event-form" action="{{ route('event.update', $event) }}" method="post">
    <table>
        <tbody>
            <tr>
                <th>Intitulé</th>
                <td>
                    <input type="text" name="title" value="{{ $event->title }}" required>
                </td>
            </tr>

            <tr>
                <th>Nombre de places</th>
                <td>
                    <input type="text" name="maximum_places" value="{{ $event->maximum_places }}" required>
                </td>
            </tr>

            <tr>
                <th>Débute le</th>
                <td>
                    <input type="date" name="start_at" value="{{ $event->start_at->format('Y-m-d') }}" required>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('event.show', $event) }}">Retour</a>
    <button type="submit">Valider</button>
</form>

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
                <a href="{{ route('reservation.destroy', [$event, $user]) }}" data-delete-reservation>Supprimer la réservation</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<i>Aucune réservation...</i>
@endif

<h3>Ajouter une réservation</h3>

@if ($users->count())
<form id="reservation-form" action="{{ route('reservation.store', $event) }}" method="POST">
    <select name="user_id">
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->complete_name }}</option>
        @endforeach
    </select>

    <button type="submit">Ajouter</button>
</form>
@else
<i>Tous les utilisateurs participent déjà à cet événement.</i>
@endif
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // On form submitting, call the API to update the event from the database,
        // then redirect the client to the newly updated event page.
        $('#event-form').on('submit', function(e) {
            e.preventDefault();
            
            const self = this;
            
            $.ajax({
                url: $(self).attr('action'),
                type: 'PUT',
                data: $(self).serialize(),
                success: data => {
                    window.location.replace(`{{ url('/') }}/event/show/${data.event.id}`);
                }
            });
        });
        
        // When the delete button of a reservation is clicked, ask confirmation first.
        // Then, if confirmed, call the API to delete the reservation.
        // Finally, reload the current page.
        $('a[data-delete-reservation]').on('click', function(e) {
            e.preventDefault();
            
            const self = this,
                confirmation = window.confirm('Êtes-vous sûr de supprimer cette réservation ?');
            
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
        
        // On form submitting, call the API to store a reservation into the database,
        // then reload the current page.
        $('#reservation-form').on('submit', function(e) {
            e.preventDefault();
            
            const self = this;
            
            $.ajax({
                url: $(self).attr('action'),
                type: 'POST',
                data: $(self).serialize(),
                success: data => {
                    window.location.reload();
                }
            });
        });
    });
</script>
@endsection