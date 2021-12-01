@extends('layout')

@section('content')
    <h2>Pratiques</h2>
    <p>Mises à jour dans les {{ $filtervalue }} derniers jours</p>
    @foreach(\App\Models\Practice::all() as $practice)
        <p>{{ $practice->description }}<br>{{ $practice->domain->name }}</p>
    @endforeach
@endsection
