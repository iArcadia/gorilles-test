@extends('_layout.master')

@section('title', 'Edition d\'une fiche utilisateur - ' . $user->complete_name)

@section('content')
<form action="{{ route('user.update', $user) }}" method="post">
    <table>
        <tbody>
            <tr>
                <th>Prénom</th>
                <td>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" required>
                </td>
            </tr>

            <tr>
                <th>Nom</th>
                <td>
                    <input type="text" name="name" value="{{ $user->name }}" required>
                </td>
            </tr>

            <tr>
                <th>Date de naissance</th>
                <td>
                    <input type="date" name="birthday" value="{{ $user->birthday->format('Y-m-d') }}" required>
                </td>
            </tr>

            <tr>
                <th>Adresse email</th>
                <td>
                    <input type="email" name="email" value="{{ $user->email }}" required>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('user.show', $user) }}">Retour</a>
    <button type="submit">Valider</button>
</form>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // On form submitting, call the API to update the user from the database,
        // then redirect the client to the newly updated user page.
        $('form').on('submit', function(e) {
            e.preventDefault();
            
            const self = this;
            
            $.ajax({
                url: $(self).attr('action'),
                type: 'PUT',
                data: $(self).serialize(),
                success: data => {
                    window.location.replace(`{{ url('/') }}/user/show/${data.user.id}`);
                }
            });
        });
    });
</script>
@endsection