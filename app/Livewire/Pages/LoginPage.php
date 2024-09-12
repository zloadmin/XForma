<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPage extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;
    public array $credentials = [];

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required'
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
        if (Auth::attempt($this->credentials)) {
            return redirect()->route('dashboard');
        }
        $this->addError('email', __('auth.failed'));
    }

    public function render()
    {
        return view('livewire.pages.login-page')
            ->layout('components.layouts.card')->layoutData([
                'title' => 'Вход'
            ]);
    }
}
