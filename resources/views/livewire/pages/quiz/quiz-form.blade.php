<form wire:submit.prevent="saveQuiz">
    <!--- Название квиза Field --->
    <div class="form-group">
        <label for="quiz_name">Название квиза</label>
        <input class="form-control @error('quiz_name') is-invalid @enderror" type="text" wire:model="quiz_name">
        @error('quiz_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="saveQuiz">
        <div wire:loading.delay wire:target="saveQuiz">
            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
            Загрузка...
        </div>
        <div wire:loading.delay.remove wire:target="saveQuiz">
            Сохранить
        </div>
    </button>
</form>