<?php
declare(strict_types=1);


namespace App\Livewire\Pages\User;


use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRole;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

trait HasUserForm
{

    public $username;
    public $full_name;
    public $age;
    public $company_name;
    public $job_title;
    public $note;
    public $education_mode;
    public $is_active;
    public $role;
    public $password;
    public $password_confirmation;


}