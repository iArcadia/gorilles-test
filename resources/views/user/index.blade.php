@extends('_layout.master')

@section('title', 'Liste des utilisateurs')

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Adresse email</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->birthday->format('d/m/Y') }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('user.show', $user) }}">Voir</a>
                <a href="{{ route('user.edit', $user) }}">Modifier</a>
                <a href="{{ route('user.destroy', $user) }}" data-delete-user>Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // When the delete button of a user is clicked, ask confirmation first.
        // Then, if confirmed, call the API to (soft) delete the user and all his
        // reservations. Finally, reload the current page.
        $('a[data-delete-user]').on('click', function(e) {
            e.preventDefault();
            
            const self = this,
                confirmation = window.confirm('Êtes-vous sûr de supprimer cet utilisateur ?');
            
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