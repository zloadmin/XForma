<div class="row">
    <div class="col-md-8">
        <!--- Ответ Field --->
        <div class="form-group">
            <label for="answerList. {{ $index }}">Ответ {{ $index + 1}}</label>
            <textarea class="form-control @error('answerList.'. $index ) is-invalid @enderror"
                      wire:model="answerList.{{ $index }}"></textarea>
            @error('answerList.'. $index)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <!--- Правильный ответ Field --->
        <div class="form-check mt-3">
            <input class="form-check-input @error('is_right') is-invalid @enderror"
                   type="radio"
                   value="{{ $index }}"
                   wire:model="is_right" id="is_right.{{ $index }}">
            <label class="form-check-label" for="is_right.{{ $index }}">
                Правильный
            </label>
            @error('is_right')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        @if ($index > 0)
            <button class="btn btn-danger mt-3 float-right" type="button" wire:click="deleteAnswer({{ $index }})">
                <i class="mdi mdi-trash-can"></i>
            </button>
        @endif
    </div>
</div>