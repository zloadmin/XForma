<div class="col-md-12">
    <a href="{{ route('create-question-page', $quiz) }}" class="btn btn-danger mb-3" wire:navigate>
        <i class="mdi mdi-plus-circle mr-2"></i>
        Создать вопрос
    </a>
    <table class="table table-striped table-centered mb-2">
        <thead>
        <tr>
            <th>#</th>
            <th>Текст вопроса</th>
            <th>Ответов</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <td>
                    {{ $question->id }}
                </td>
                <td>{{ $question->text }}</td>
                <td>{{ $question->answers_count }}</td>
                <td class="table-action text-right">

                        <a href="{{ route('edit-question-page', [$quiz, $question]) }}" class="action-icon" wire:navigate>
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <a href="#" class="action-icon"
                           wire:click.prevent="delete({{ $question->id }})"
                           wire:confirm="Удалить вопрос?"
                        >
                            <i class="mdi mdi-delete"></i>
                        </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>