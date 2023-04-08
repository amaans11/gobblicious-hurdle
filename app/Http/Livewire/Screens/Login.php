<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $is_password_visible = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ];

    public function togglePassword()
    {
        $this->is_password_visible = ! $this->is_password_visible;
    }

    public function submit()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (! Auth::attempt($credentials)) {
            $this->addError('password', 'Email or password is not correct');

            return;
        }

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.screens.login')
            ->layout('layouts.guest');
    }
}
