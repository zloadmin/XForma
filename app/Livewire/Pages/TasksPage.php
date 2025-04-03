<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Task;
use Livewire\Attributes\Title;
use Livewire\Component;

class TasksPage extends Component
{
    use HasBreadcrumb;

    public $tasks;

    public function mount()
    {
        $this->tasks = Task::query()->orderBy('id')->get();
    }
    #[Title('Задания')]
    public function render()
    {
        return view('livewire.pages.tasks-page')->layoutData([
            'breadcrumb' => $this->getTasksPageItem()
        ]);
    }
}
