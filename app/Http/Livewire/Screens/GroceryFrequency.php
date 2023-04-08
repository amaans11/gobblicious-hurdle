<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GroceryFrequency extends Component
{
    public string $input = '';

    protected $rules = [
        'input' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('groceryFrequency', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('groceryFrequency', $this->input);
        $user->save();

        return redirect()->route('shoppingList');
    }

    public function back()
    {
        return redirect()->route('shopForm');
    }

    public function render()
    {
        $options = [
            'everyDay' => 'Every day',
            '2-3 times a week' => '2-3 times a week',
            'every 1-2 weeks' => 'Every 1-2 weeks',
            'once a month' => 'Once a month',
            'once every few months' => 'Once every few months',
        ];

        return view('livewire.screens.grocery-frequency', ['options' => $options])
            ->layout('layouts.app');
    }
}
