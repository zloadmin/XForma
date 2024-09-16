<?php

namespace App\Livewire\Pages;

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRole;
use App\Livewire\Pages\User\HasUserForm;
use App\Livewire\Traits\HasBreadcrumb;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUserPage extends Component
{
    use HasBreadcrumb;
    use HasUserForm;

    public User $user;
    public function rules()
    {
        return [
            'username'              => ['required', 'string', 'max:' . User::USERNAME_MAX],
            'full_name'             => ['required', 'string', 'max:250'],
            'age'                   => ['required', 'numeric', 'min:1', 'max:100'],
            'company_name'          => ['required', 'string', 'max:250'],
            'job_title'             => ['required', 'string', 'max:250'],
            'note'                  => ['required'],
            'education_mode'        => ['required', Rule::in(UserEducationMode::values())],
            'is_active'             => ['boolean'],
            'role'                  => ['required', Rule::in(UserRole::values())],
            'password'              => ['nullable', 'confirmed', 'string', 'min:8'],
            'password_confirmation' => ['nullable'],
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->full_name = $user->full_name;
        $this->age = $user->age;
        $this->company_name = $user->company_name;
        $this->job_title = $user->job_title;
        $this->note = $user->note;
        $this->education_mode = $user->education_mode;
        $this->is_active = $user->is_active;
        $this->role = $user->role->value;
        $this->password = '';
    }

    public function saveUser()
    {
        $this->validate();
        $this->updateUser();
        return $this->redirectRoute('users-page', [], true, true);
    }

    private function updateUser(): void
    {
        $this->user->username = $this->username;
        $this->user->full_name = $this->full_name;
        $this->user->age = $this->age;
        $this->user->company_name = $this->company_name;
        $this->user->job_title = $this->job_title;
        $this->user->note = $this->note;
        $this->user->education_mode = $this->education_mode;
        $this->user->is_active = $this->is_active;
        $this->user->role = $this->role;
        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }
        $this->user->update();
    }

    public function render()
    {
        return view('livewire.pages.edit-user-page')->layoutData([
            'breadcrumb' => $this->getCreateUserPageBreadcrumb()
        ]);
    }
}
