@extends ('layout')

@section ('content')
    <h2>Pratiques publiées</h2>
    @foreach($practices as $practice)
        <div class="card p-2 m-2">
            {{ $practice->description }}
            <div class="card-footer small">
                Mis à jour: {{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}
            </div>
        </div>
    @endforeach
@endsection
