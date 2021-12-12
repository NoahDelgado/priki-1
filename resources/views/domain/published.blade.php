@extends ('layout')

@section ('content')
    <div class="title text-center">Pratiques publiées sans le domaine {{ $domain->name }}:</div>
    @forelse($domain->publishedPractices() as $practice)
        <livewire:practice :practice="$practice" :showDomain="false"/>
    @empty
        <div class="title text-center">Il n'y en a pas 😩</div>
    @endforelse
@endsection
