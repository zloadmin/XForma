<?php

namespace App\Livewire\Pages;

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRole;
use App\Livewire\Pages\User\HasUserForm;
use App\Livewire\Traits\HasBreadcrumb;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateUserPage extends Component
{
    use HasBreadcrumb;
    use HasUserForm;

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
            'password'              => ['required', 'confirmed', 'string', 'min:8'],
            'password_confirmation' => ['required'],
        ];
    }

    public function saveUser()
    {
        $this->validate();
        $this->createUser();
        return $this->redirectRoute('users-page', [], true, true);
    }
    private function createUser() : void
    {
        User::create([
            'username'       => $this->username,
            'full_name'      => $this->full_name,
            'age'            => $this->age,
            'company_name'   => $this->company_name,
            'job_title'      => $this->job_title,
            'note'           => $this->note,
            'education_mode' => $this->education_mode,
            'is_active'      => $this->is_active,
            'role'           => $this->role,
            'password'       => Hash::make($this->password)
        ]);
    }

    #[Title('Создать пользователя')]
    public function render()
    {
        return view('livewire.pages.create-user-page')->layoutData([
            'breadcrumb' => $this->getCreateUserPageBreadcrumb()
        ]);
    }
}
