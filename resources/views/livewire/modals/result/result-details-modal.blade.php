<div>
    <div class="modal-header">
        <h5 class="modal-title">Результаты {{ $user->full_name }} ({{ $result->created_at->format('d.m.Y H-i') }})</h5>
        <button type="button" class="btn-close" wire:click="$dispatch('hideModal')" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Тип задания</th>
                <th scope="col">№Задания</th>
                <th scope="col">Бал за точность</th>
                <th scope="col">Бал за последовательность</th>
                <th scope="col">Сумма баллов</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasksResults as $tasksResult)
                <tr>
                    <td>{{ $tasksResult->task->type ?? '' }}</td>
                    <td>{{ $tasksResult->task->id ?? '' }}</td>
                    <td>{{ $tasksResult->point_accuracy }}</td>
                    <td>{{ $tasksResult->point_consistency }}</td>
                    <td>{{ $tasksResult->point_accuracy  + $tasksResult->point_consistency }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
