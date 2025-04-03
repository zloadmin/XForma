<?php

namespace App\Livewire\Modals\Teacher;

use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditTeacherModal extends Component
{
    use HasTeacherForm;
    use HasEvents;

    public Teacher $teacher;

    public function mount(int $teacherId): void
    {
        $this->teacher = Teacher::findOrFail($teacherId);
        $this->loadModel($this->teacher);
    }

    public function render()
    {
        return view('livewire.modals.teacher.edit-teacher-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->updateTeacher();
        $this->hideModal();
        $this->refreshTeachersTable();
    }

    private function updateTeacher(): void
    {
        $this->teacher->update([
            'full_name'       => $this->full_name,
            'email'           => $this->email,
            'password_unsafe' => $this->password_unsafe,
            'password'        => Hash::make($this->password_unsafe),
            'company_name'    => $this->company_name,
            'job_title'       => $this->job_title,
            'note'            => $this->note,
        ]);
//        $this->teacher->students()->sync($this->student_ids);
        Student::where('teacher_id', $this->teacher->id)->update(['teacher_id' => null]);
        Student::whereIn('id', $this->student_ids)->update(['teacher_id' => $this->teacher->id]);


    }


}
