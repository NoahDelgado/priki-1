@forelse($practices as $practice)
    <livewire:practice :practice="$practice" :showDomain=$showDomain />
@empty
    <div class="title text-center">Il n'y en a pas 😩</div>
@endforelse
