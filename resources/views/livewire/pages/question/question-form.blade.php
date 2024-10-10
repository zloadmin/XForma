<form wire:submit.prevent="saveQuestion">
    @include('livewire.pages.question.question-form.question-textarea-input')

    @include('livewire.pages.question.question-form.question-answer-title')
    @php
        $key = 0;
    @endphp
    <div class="row">
        @foreach($existsAnswerImages as $x => $file)
            @include('livewire.pages.question.question-form.question-answer-image')
            @php
                $key++;
            @endphp
        @endforeach
        @foreach($answerImages as $y => $file)
            @include('livewire.pages.question.question-form.question-answer-image')
            @php
                $key++;
            @endphp
        @endforeach
    </div>

    @include('livewire.pages.question.question-form.question-save-button')
</form>