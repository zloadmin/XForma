<div class="col-md-12">
    <table class="laravel-livewire-table table table-striped">
      <thead>
        <tr>
          <th scope="col">Тип Задания</th>
          <th scope="col">№Задания</th>
          <th scope="col">Название  оборудования</th>
          <th scope="col">Название задания</th>
          <th scope="col">Суть задания </th>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->type }}</td>
                <td>{{ $task->id }}</td>
                <td>{{ $task->equipment_name }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>