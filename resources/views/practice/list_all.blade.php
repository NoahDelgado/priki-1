@extends('layout')

@section('content')
    <div class="container p-3">
        <h1>All practices</h1>
        @include('practice._list', ['showDomain' => true])
    </div>
@endsection
