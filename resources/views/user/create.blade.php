@extends('_layout.master')

@section('title', 'Création d\'une fiche utilisateur')

@section('content')
<form action="{{ route('user.store') }}" method="post">
    <table>
        <tbody>
            <tr>
                <th>Prénom</th>
                <td>
                    <input type="text" name="first_name" required>
                </td>
            </tr>

            <tr>
                <th>Nom</th>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr>

            <tr>
                <th>Date de naissance</th>
                <td>
                    <input type="date" name="birthday" required>
                </td>
            </tr>

            <tr>
                <th>Adresse email</th>
                <td>
                    <input type="email" name="email" required>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('user.index') }}">Retour</a>
    <button type="submit">Valider</button>
</form>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // On form submitting, call the API to store the user into the database,
        // then redirect the client to the newly inserted user page.
        $('form').on('submit', function(e) {
            e.preventDefault();
            
            const self = this;
            
            $.ajax({
                url: $(self).attr('action'),
                type: 'POST',
                data: $(self).serialize(),
                success: data => {
                    window.location.replace(`{{ url('/') }}/user/show/${data.user.id}`);
                }
            });
        });
    });
</script>
@endsection