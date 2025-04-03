<div class="col-md-12">
    <table class="laravel-livewire-table table table-striped">
      <thead>
        <tr>
          <th scope="col">Номер Билета</th>
          <th scope="col">№Заданий</th>
          <th scope="col">Задания</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ implode(",", $ticket->tasks()->pluck('id')->toArray()) }}</td>
                <td>
                    <ul>
                        @foreach($ticket->tasks()->get() as $task)
                            <li>{{ $task->id }}. {{ $task->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>