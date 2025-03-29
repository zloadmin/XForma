<?php

namespace App\Livewire\Pages;

use App\Enums\User\UserRole;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class LoginPage extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;
    public array $credentials = [];

    protected $rules = [
        'email'    => ['required', 'email'],
        'password' => ['required']
    ];

    public function setCredentials()
    {
        $this->credentials = [
            'email'    => $this->email,
            'password' => $this->password,
        ];
    }

    public function login()
    {
        $this->validate();
        $this->setCredentials();
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            fn(Builder $query) => $query->where('role', UserRole::Admin),
        ])) {
//            return redirect()->route('dashboard');
            return $this->redirectRoute('dashboard', [], true, true);
        }
//        if (Auth::attempt($this->credentials)) {
//            return redirect()->route('dashboard');
//        }
        $this->addError('username', 'Неверный логин или пароль.');
    }

    public function render()
    {
        return view('livewire.pages.login-page')
            ->layout('components.layouts.card')->layoutData([
                'title' => 'Вход'
            ]);
    }
}
