@extends('layout')

@section('content')
    <h2></h2>
    <p>Pratiques mises à jour dans les <input id="numDays" class="col-1 text-center" type="number" value="{{ $filtervalue }}"> derniers jours</p>
    @foreach(\App\Models\Practice::publishedAndRecentlyUpdated($filtervalue) as $practice)
        <livewire:practice :practice="$practice"/>
    @endforeach
@endsection
@push('page-specific-scripts')
    <script src="/js/homepage.js" defer></script>
@endpush
