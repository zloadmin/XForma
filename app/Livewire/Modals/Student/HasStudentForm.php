<?php
declare(strict_types=1);


namespace App\Livewire\Modals\Student;

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRandomMode;
use App\Enums\User\UserRole;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Validate;


trait HasStudentForm
{

    public string $full_name = '';
    public string $email = '';
    public string $password_unsafe = '';
    public string $company_name = '';
    public string $job_title = '';
    public string $education_mode = '';
    public string $random_mode = '';
    public array $ticket_ids = [];
    public string $note = '';
    public int|null $teacher_id = null;
    public iterable $tickets = [];
    public iterable $teachers = [];
    public bool $isDisableTickets = false;

    public function mountHasStudentForm(): void
    {
        $this->tickets = Ticket::with('tasks')->get();
        $this->teachers = Teacher::query()->pluck('full_name', 'id')->toArray();
    }

    public function updatedRandomMode(): void
    {
        $this->isDisableTickets = $this->isRandomMode();
    }

    public function isRandomMode(): bool
    {
        return $this->random_mode == UserRandomMode::Yes->value;
    }

    public function rules(): array
    {
        return [
            'full_name'       => ['required', 'string', 'max:200'],
            'email'           => ['required', 'email', 'max:200', Rule::unique('users', 'email')->ignore($this->student ?? null)],
            'password_unsafe' => ['required', 'string', 'min:4', 'max:200'],
            'company_name'    => ['nullable', 'string', 'max:200'],
            'job_title'       => ['nullable', 'string', 'max:200'],
            'education_mode'  => ['required', Rule::in(UserEducationMode::values())],
            'ticket_ids'      => ['required_if:random_mode,' . UserRandomMode::No->value, 'array'],
            'ticket_ids.*'    => ['required', Rule::exists('tickets', 'id')],
            'random_mode'     => ['required', Rule::in(UserRandomMode::values())],
            'note'            => ['nullable'],
            'teacher_id'      => ['nullable', Rule::exists('users', 'id')->where(function ($query) {
                $query->where('role', UserRole::Teacher);
            })],
        ];
    }

    public function loadModel(Student $student): void
    {
        $this->full_name = $student->full_name;
        $this->email = $student->email;
        $this->password_unsafe = $student->password_unsafe;
        $this->company_name = $student->company_name;
        $this->job_title = $student->job_title;
        $this->note = $student->note;
        $this->teacher_id = $student->teacher_id;
        $this->education_mode = $student->education_mode->value ?? '';
        $this->ticket_ids = $student->tickets->pluck('id')->toArray();
        $this->random_mode = $student->random_mode->value ?? '';
        $this->isDisableTickets = $student->random_mode == UserRandomMode::Yes;

    }
}