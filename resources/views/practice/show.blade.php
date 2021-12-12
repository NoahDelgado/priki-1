@extends('layout')

@section('content')
    <div class="container-fluid p-3">
        <table class="table table-bordered">
            <tr>
                <th>Description</th>
                <td>{{ $practice->description }}</td>
            </tr>
            <tr>
                <th>Domaine</th>
                <td>{{ $practice->domain->name }}</td>
            </tr>
            <tr>
                <th>Soumis par</th>
                <td>{{ $practice->submitter->name }}</td>
            </tr>
            <tr>
                <th>Le</th>
                <td>{{ Carbon\Carbon::make($practice->created_at)->isoformat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <th>Modifié le</th>
                <td>{{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <th>Etat de publication</th>
                <td>{{ $practice->publicationState->name }}</td>
            </tr>
        </table>
    </div>
@endsection
