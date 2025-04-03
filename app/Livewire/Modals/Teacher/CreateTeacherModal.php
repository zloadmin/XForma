<?php

namespace App\Livewire\Modals\Teacher;

use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateTeacherModal extends Component
{
    use HasTeacherForm;
    use HasEvents;

    public function render()
    {
        return view('livewire.modals.teacher.create-teacher-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->createTeacher();
        $this->hideModal();
        $this->refreshTeachersTable();
    }

    private function createTeacher(): void
    {
        $teacher = Teacher::create([
            'full_name'       => $this->full_name,
            'email'           => $this->email,
            'password_unsafe' => $this->password_unsafe,
            'password'        => Hash::make($this->password_unsafe),
            'company_name'    => $this->company_name,
            'job_title'       => $this->job_title,
            'note'            => $this->note,
        ]);

        if($this->student_ids) {
            Student::whereIn('id', $this->student_ids)->update(['teacher_id' => $teacher->id]);
        }

    }


}
