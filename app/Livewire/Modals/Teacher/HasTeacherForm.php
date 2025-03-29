<?php
declare(strict_types=1);


namespace App\Livewire\Modals\Teacher;

use App\Enums\User\UserRole;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Validate;


trait HasTeacherForm
{

    public string $full_name = '';
    public string $email = '';
    public string $password_unsafe = '';
    public string $company_name = '';
    public string $job_title = '';
    public string $note = '';
    public array $student_ids = [];
    public array $students = [];

    public function mountHasTeacherForm(): void
    {
        $this->students = Student::query()->pluck('full_name', 'id')->toArray();
    }

    public function rules(): array
    {
        return [
            'full_name'       => ['required', 'string', 'max:200'],
            'email'           => ['required', 'email', 'max:200', Rule::unique('users', 'email')],
            'password_unsafe' => ['required', 'string', 'min:4', 'max:200'],
            'company_name'    => ['nullable', 'string', 'max:200'],
            'job_title'       => ['nullable', 'string', 'max:200'],
            'note'            => ['nullable'],
            'student_ids'     => ['nullable', 'array'],
            'student_ids.*'   => [
                'required',
                Rule::exists('users', 'id')->where(function ($query) {
                    $query->where('role', UserRole::Student);
                })
            ]
        ];
    }

    public function loadModel(Teacher $teacher): void
    {
        $this->full_name = $teacher->full_name;
        $this->email = $teacher->email;
        $this->password_unsafe = $teacher->password_unsafe;
        $this->company_name = $teacher->company_name;
        $this->job_title = $teacher->job_title;
        $this->note = $teacher->note;
        $this->student_ids = $teacher->student_ids;
    }
}