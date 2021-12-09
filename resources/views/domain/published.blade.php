@extends ('layout')

@section ('content')
    @foreach($practices as $practice)
        <livewire:practice :practice="$practice"/>
    @endforeach
@endsection
