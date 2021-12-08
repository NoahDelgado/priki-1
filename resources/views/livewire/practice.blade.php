<div>
    <div class="card p-2 m-2 border border-2 border-dark shadow">
        {{ $practice->description }}
        <div class="card-footer text-xs text-right">
            Domaine: {{ $practice->domain->name }}, mis à jour: {{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}
        </div>
    </div>
</div>
