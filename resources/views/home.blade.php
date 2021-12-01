@extends('layout')

@section('content')
    <h2></h2>
    <p>Pratiques mises à jour dans les <input id="numDays" class="col-1 text-center" type="number" value="{{ $filtervalue }}"> derniers jours</p>
    @foreach(\App\Models\Practice::publishedModifiedOnes($filtervalue) as $practice)
        <div class="card p-2 m-2">{{ $practice->description }}<div class="card-footer small">Domaine: {{ $practice->domain->name }}, mis à jour: {{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}</div></div>
    @endforeach
@endsection
