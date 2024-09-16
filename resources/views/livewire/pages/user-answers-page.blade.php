<div class="col-md-12">

    <table class="table table-striped table-centered table-sm mb-2">
        <thead>
        <tr>
            <th>#</th>
            <th>Квиз</th>
            <th>Пользователь</th>
            <th>Время потрачено</th>
            <th>Вопрос</th>
            <th>Ответ</th>
            <th>Правильно</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userAnswers as $userAnswer)
            <tr>
                <td>{{ $userAnswer->id }}</td>
                <td>{{ $userAnswer->quiz->name ?? '' }}</td>
                <td>{{ $userAnswer->user->name ?? '' }}</td>
                <td>{{ $userAnswer->spend_time ?? '' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($userAnswer->question->text ?? '', 30) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($userAnswer->answer->text ?? '', 30) }}</td>
                <td>{{ $userAnswer->is_right ? 'Да' : 'Нет' }}</td>
                <td>
                    <nobr>{{ $userAnswer->created_at->diffForHumans() }}</nobr>
                    <br>
                    <nobr>{{  $userAnswer->created_at->format('d.m.Y H:i:s')}}</nobr>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $userAnswers->links() }}
</div>