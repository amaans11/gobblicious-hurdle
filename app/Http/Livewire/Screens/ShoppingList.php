<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingList extends Component
{
    public array $input = [];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('shoppingList', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('shoppingList', $this->input);
        $user->save();

        return redirect()->route('dietForm');
    }

    public function back()
    {
        return redirect()->route('groceryFrequency');
    }

    public function render()
    {
        $options = [
            'snacks/sweets' => 'Snacks/sweets',
            'cookingStaples' => 'Cooking staples',
            'pantryEssentials' => 'Pantry essentials',
            'meat/seafood' => 'Meat/seafood',
            'wine' => 'Wine',
            'cleaning/laundry' => 'Cleaning/laundry',
            'bath&body' => 'Bath & body',
            'babiesOrKids ' => 'Babies or kids',
            'supplements' => 'Supplements',
            'pets' => 'Pets',
        ];

        return view('livewire.screens.shopping-list', ['options' => $options])
            ->layout('layouts.app');
    }
}
