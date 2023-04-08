<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShopForm extends Component
{
    public array $input = [];
    private array $options = [
        'myself' => 'Myself',
        'partner' => 'Partner',
        'kids' => 'Kids',
        'babies' => 'Babies',
        'extended-famiy' => 'Extended family',
        'pets' => 'Pets',
    ];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('shopFor', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('shopFor', $this->input);
        $user->save();

        return redirect()->route('groceryFrequency');
    }

    public function selectAll()
    {
        $this->input = array_keys($this->options);
    }

    public function render()
    {
        return view('livewire.screens.shop-form', ['options' => $this->options])
            ->layout('layouts.app');
    }
}
