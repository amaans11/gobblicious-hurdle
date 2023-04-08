<?php

namespace App\Http\Livewire\Screens;

use Livewire\Component;

class ReceiptUploaded extends Component
{
    public function render()
    {
        return view('livewire.screens.receipt-uploaded')
            ->layout('layouts.app');
    }
}
