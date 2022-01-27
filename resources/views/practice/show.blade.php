@extends('layout')

@section('content')
    <div class="container p-3">
        <div class="row text-xl">
            <p>Titre : {{ $practice->title }}
                <i class="fa fa-edit toggling float-right" data-target="edit"></i>
            </p>
        </div>
        <div id="edit" class="d-none">
            <div class="col-10 row">
                <form action="/titlechange" method="post">
                    @csrf
                    <input type="hidden" value="{{ $practice->id }}" name="practice">
                    <input type="hidden" value="{{ $practice->title }}" name="oldtitle">

                    <div class="bg-warning">
                        Nouveau titre:
                    </div>
                    <div class="row">
                        <input type="text" id="title" name="title" class="col-10" value="{{ $practice->title }}"
                            required>
                    </div>
                    <div class=" bg-warning">
                        Raison du changement:
                    </div>
                    <div class="row">
                        <textarea type="text" id="reason" name="reason" class="col-10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary col-2">Enregistre</button>
                </form>
            </div>
        </div>
        <div class="row text-xl">
            <p>{{ $practice->description }}</p>
            <p class="text-right"><i class="fa fa-info-circle toggling float-right" data-target="details"></i></p>
        </div>
        <div id="details" class="d-none">
            <div class="row">
                <div class="col-1 border bg-light">Domaine</div>
                <div class="col-11">{{ $practice->domain->name }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Soumis par</div>
                <div class="col-11">{{ $practice->submitter->name }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Le</div>
                <div class="col-11">{{ Carbon\Carbon::make($practice->created_at)->isoformat('D MMMM Y') }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Modifié le</div>
                <div class="col-11">{{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Etat</div>
                <div class="col-11">{{ $practice->publicationState->name }}</div>
                @can('publish', $practice)
                    <x-publish-practice-form :id="$practice->id" />
                @endcan
            </div>
        </div>

        <x-opinion-list :opinions="$practice->opinions" />

        @if (!$practice->opinionOf(Auth::user()))
            <x-opinion-form :on="$practice->id" />
        @endif

        <div>
            <div class="h5">historique</div>
            @forelse($practice->changelogs as $log)
                <div class "row">
                    <p>

                    <div>utilisateur: {{ $log->user->name }}</div>
                    <div>Raison: {{ $log->reason }}</div>
                    <div>Ancient titre: {{ $log->previously }}</div>
                    <div>Date: {{ $log->updated_at }}</div>
                    </p>

                </div>
            @empty
                <p>Aucun</p>
            @endforelse
        </div>

    </div>
@endsection
