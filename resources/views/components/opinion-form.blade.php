<div>
    <form action="/opinion" method="post">
        @csrf
        <input type="hidden" value="{{ $practice_id }}" name="practice">
        <div class="form-group m-4">
            <label for="opinion">Mon opinion à ce sujet:</label>
            <textarea id="opinion" name="opinion" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
