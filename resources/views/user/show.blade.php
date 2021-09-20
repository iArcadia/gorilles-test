@extends('_layout.master')

@section('title', 'Fiche utilisateur - ' . $user->complete_name)

@section('content')
<table>
    <tbody>
        <tr>
            <th>Prénom</th>
            <td>{{ $user->first_name }}</td>
        </tr>
        
        <tr>
            <th>Nom</th>
            <td>{{ $user->name }}</td>
        </tr>
        
        <tr>
            <th>Date de naissance</th>
            <td>{{ $user->birthday->format('d/m/Y') }}</td>
        </tr>
        
        <tr>
            <th>Adresse email</th>
            <td>{{ $user->email }}</td>
        </tr>
    </tbody>
</table>

<a href="{{ route('user.index') }}">Retour</a>
<a href="{{ route('user.edit', $user) }}">Modifier</a>
<a id="delete-link" href="{{ route('user.destroy', $user) }}">Supprimer</a>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // When the delete link is clicked, ask confirmation first.
        // Then, if confirmed, call the API to (soft) delete the user and all his
        // reservations. Finally, redirect the client to the user list.
        $('#delete-link').on('click', function(e) {
            e.preventDefault();
            
            const self = this,
                confirmation = window.confirm('Êtes-vous sûr de supprimer cet utilisateur ?');
            
            if (confirmation) {
                $.ajax({
                    url: $(self).attr('href'),
                    type: 'DELETE',
                    success: data => {
                        window.location.replace(`{{ url('/') }}/user`);
                    }
                });
            } 
        });
    });
</script>
@endsection