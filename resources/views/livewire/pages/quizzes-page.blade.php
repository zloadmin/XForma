<div class="col-md-12">
    <a href="{{ route('create-quiz-page') }}" class="btn btn-danger mb-3" wire:navigate>
        <i class="mdi mdi-plus-circle mr-2"></i>
        Создать
    </a>
    <table class="table table-striped table-centered mb-2">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Вопросы</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>
                    {{ $quiz->id }}
                </td>
                <td>{{ $quiz->name }}</td>
                <td>{{ $quiz->questions_count }}</td>
                <td class="table-action text-right">
                    <a href="{{ route('questions-page', $quiz) }}" class="btn btn-warning" wire:navigate>
                        Вопросы
                    </a>
                    <a href="{{ route('edit-quiz-page', $quiz) }}" class="btn btn-success" wire:navigate>
                        Редактировать
                    </a>
                    <a href="#" class="btn btn-danger"
                            wire:click.prevent="delete({{ $quiz->id }})"
                            wire:confirm="Удалить квиз?">
                        Удалить
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $quizzes->links() }}
</div>