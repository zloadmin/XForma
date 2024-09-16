<form wire:submit.prevent="saveQuestion">
    <!--- Текст вопроса Field --->
    <div class="form-group">
        <label for="question_text">Текст вопроса</label>
        <textarea class="form-control @error('question_text') is-invalid @enderror"
                  wire:model="question_text"></textarea>
        @error('question_text')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5>Ответы</h5>
        </div>
        <div class="col-md-6">
            <button class="btn btn-success float-right" type="button" wire:click="addAnswer">Добавить ответ</button>
        </div>
    </div>
    <div>
        @foreach($answerList as $index => $answer)
            @include('livewire.pages.question.answer-form')
        @endforeach
    </div>

    <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="saveQuestion">
        <div wire:loading.delay wire:target="saveQuestion">
            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
            Загрузка...
        </div>
        <div wire:loading.delay.remove wire:target="saveQuestion">
            Сохранить
        </div>
    </button>
</form>