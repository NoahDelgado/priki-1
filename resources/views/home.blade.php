@extends('layout')

@section('content')
    <h2></h2>
    <p>Pratiques mises à jour dans les <input id="numDays" class="col-1 text-center" type="number" value="{{ $filtervalue }}"> derniers jours</p>
    @foreach(\App\Models\Practice::publishedModifiedOnes($filtervalue) as $practice)
        <livewire:practice :practice="$practice"/>
    @endforeach
@endsection
