<div class="card">
    <div class="card-body">
        <!--- Текст вопроса Field --->
        <div class="form-group">
            <label for="questionText">Текст вопроса</label>
            <textarea class="form-control
                    @error('questionText') is-invalid @enderror
                      @error('isRight') is-invalid @enderror
                      @error('answerImages') is-invalid @enderror
                      "
                      wire:model="questionText"></textarea>
            @error('answerImages')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('questionText')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('isRight')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @include('livewire.pages.question.question-form.question-file-upload-button')
    </div>
</div>