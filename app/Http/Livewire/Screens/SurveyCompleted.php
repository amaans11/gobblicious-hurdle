<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SurveyCompleted extends Component
{
    public function submit(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.screens.survey-completed')
            ->layout('layouts.app', ['is_dollar_background' => true]);
    }
}
