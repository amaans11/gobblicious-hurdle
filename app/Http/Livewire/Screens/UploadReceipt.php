<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadReceipt extends Component
{
    use WithFileUploads;

    public $receipt;

    protected $rules = [
        'receipt' => ['image', 'max:8192'],
    ];

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->addMedia(Storage::path($this->receipt->store('public')))
            ->toMediaCollection();

        $user->data->put('hurdle_process', 'done');
        $user->save();

        return redirect()->route('receiptUploaded');
    }

    public function render()
    {
        return view('livewire.screens.upload-receipt')
            ->layout('layouts.app');
    }
}
