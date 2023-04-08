<?php

namespace App\Http\Livewire\Screens;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.screens.welcome')
            ->layout('layouts.guest');
    }
}
