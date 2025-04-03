<?php

namespace App\Livewire\Modals\Student;

use App\Enums\User\UserRandomMode;
use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateStudentModal extends Component
{
    use HasStudentForm;
    use HasEvents;

    public function render()
    {
        return view('livewire.modals.student.create-student-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->createStudent();
        $this->hideModal();
        $this->refreshStudentsTable();
    }

    private function createStudent(): void
    {
        $student = Student::create([
            'full_name'       => $this->full_name,
            'email'           => $this->email,
            'password_unsafe' => $this->password_unsafe,
            'password'        => Hash::make($this->password_unsafe),
            'company_name'    => $this->company_name,
            'job_title'       => $this->job_title,
            'education_mode'  => $this->education_mode,
            'random_mode'     => $this->random_mode,
            'note'            => $this->note,
            'teacher_id'      => $this->teacher_id,
        ]);
        if (!$this->isRandomMode()) {
            $student->tickets()->sync($this->ticket_ids);
        }
    }


}
