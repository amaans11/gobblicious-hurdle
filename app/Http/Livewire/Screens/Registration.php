<?php

namespace App\Http\Livewire\Screens;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Registration extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public bool $is_password_visible = false;

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:8'],
    ];

    public function submit(Request $request)
    {
        $this->validate();

        $credentials = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),

        ];
        User::create($credentials);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $request->session()->regenerate();

            return redirect()->route('videos');
        }
    }

    public function togglePassword()
    {
        $this->is_password_visible = ! $this->is_password_visible;
    }

    public function render()
    {
        return view('livewire.screens.registration', ['is_password_visible'=>$this->is_password_visible])
            ->layout('layouts.guest');
    }
}
