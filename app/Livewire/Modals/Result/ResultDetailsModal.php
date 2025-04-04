<?php

namespace App\Livewire\Modals\Result;

use App\Enums\User\UserRandomMode;
use App\Livewire\Modals\Student\HasStudentForm;
use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Result;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResultDetailsModal extends Component
{

//    use HasEvents;
    public Result $result;
    public User $user;
    public Collection $tasksResults;
    public function mount(int $resultId)
    {
        $this->result = Result::findOrFail($resultId);
        $this->user = $this->result->user;
        $this->tasksResults = $this->result->resultTasks()->with('task')->get();
    }

    public function render()
    {
        return view('livewire.modals.result.result-details-modal');
    }



}
