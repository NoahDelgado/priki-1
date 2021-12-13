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
        <div class="h5">Opinions</div>
        @forelse($practice->opinions as $opinion)
            <div class="row">
                <div class="col-2 small text-gray-500 toggling mb-2" data-toggleid="{{ $opinion->id }}">
                    <div>{{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMM YY') }}, <a href="/user/{{ $opinion->user->id }}">{{ $opinion->user->name }}</a></div>
                    <div class="text-right">{{ $opinion->comments()->count() }} <i class="fa fa-comments"></i> ( {{ $opinion->upvotes() }} <i class="fa fa-thumbs-up"></i> {{ $opinion->downvotes() }} <i class="fa fa-thumbs-down"></i> )</div>
                </div>
                <div class="col-10">
                    {{ $opinion->description }}
                </div>
                <div id="toggled{{ $opinion->id }}" class="d-none">
                    @foreach ($opinion->comments as $comment)
                        <div class="row">
                            <div class="col-3 small text-gray-500 text-right">
                                {{ $comment->name }}
                                @if ($comment->pivot->points > 0)
                                    <i class="fa fa-thumbs-up"></i>
                                @elseif($comment->pivot->points < 0)
                                    <i class="fa fa-thumbs-down"></i>
                                @endif
                            </div>
                            <div class="col-7 small text-gray-500 mb-2">
                                {{ $comment->pivot->comment }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p>Aucun</p>
        @endforelse
    </div>
@endsection
