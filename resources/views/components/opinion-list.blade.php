<div>
    <div class="h5">Opinions</div>
    @forelse($opinions as $opinion)
        <div class="row">
            <div class="col-2 small text-gray-500 toggling mb-2" data-target="opinions">
                <div>{{ Carbon\Carbon::make($opinion->updated_at)->isoformat('D MMM YY') }}, <a href="/user/{{ $opinion->user->id }}">{{ $opinion->user->name }}</a></div>
                <div class="text-right">{{ $opinion->comments()->count() }} <i class="fa fa-comments"></i> ( {{ $opinion->upvotes() }} <i class="fa fa-thumbs-up"></i> {{ $opinion->downvotes() }} <i class="fa fa-thumbs-down"></i> )</div>
            </div>
            <div class="col-10">
                {{ $opinion->description }}
                @if ($opinion->references()->count() > 0)
                    <hr>
                    <div class="small text-gray-500 mb-2 text-right">
                        Refs:
                        @foreach ($opinion->references as $reference)
                            @if ($reference->url)
                                <a href="{{ $reference->url }}" target="_blank">{{ $reference->description }}</a>
                            @else
                                {{ $reference->description }}
                            @endif
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
            <div id="opinions" class="d-none">
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
                        <div class="col-9 small text-gray-500 mb-2">
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
