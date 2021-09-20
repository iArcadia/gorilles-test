@extends('_layout.master')

@section('title', 'Création d\'une fiche événement')

@section('content')
<form action="{{ route('event.store') }}" method="post">
    <table>
        <tbody>
            <tr>
                <th>Intitulé</th>
                <td>
                    <input type="text" name="title" required>
                </td>
            </tr>

            <tr>
                <th>Nombre de places</th>
                <td>
                    <input type="text" name="maximum_places" required>
                </td>
            </tr>

            <tr>
                <th>Débute le</th>
                <td>
                    <input type="date" name="start_at" required>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('event.index') }}">Retour</a>
    <button type="submit">Valider</button>
</form>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        // On form submitting, call the API to store the event into the database,
        // then redirect the client to the newly inserted event page.
        $('form').on('submit', function(e) {
            e.preventDefault();
            
            const self = this;
            
            $.ajax({
                url: $(self).attr('action'),
                type: 'POST',
                data: $(self).serialize(),
                success: data => {
                    window.location.replace(`{{ url('/') }}/event/show/${data.event.id}`);
                }
            });
        });
    });
</script>
@endsection