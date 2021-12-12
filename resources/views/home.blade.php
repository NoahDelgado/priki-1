@extends('layout')

@section('content')
    <div class="title text-center">Les news de ces <input id="numDays" class="col-1 text-center text-3xl font-bold border-0" type="number" value="{{ $filtervalue }}"> derniers jours:</div>
    @forelse(\App\Models\Practice::publishedAndRecentlyUpdated($filtervalue) as $practice)
        <livewire:practice :practice="$practice" :showDomain="true"/>
    @empty
        <div class="title text-center">Il n'y en a pas 😩</div>
    @endforelse
@endsection
@push('page-specific-scripts')
    <script src="/js/homepage.js" defer></script>
@endpush
