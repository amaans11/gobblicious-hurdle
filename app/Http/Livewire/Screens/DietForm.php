<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DietForm extends Component
{
    public array $input = [];
    private bool $reset_buttons = false;
    const NON_OF_THE_ABOVE = 'NON_OF_THE_ABOVE';

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('diets', []);
    }

    public function updatingInput($value)
    {
        if (collect($value)->contains(self::NON_OF_THE_ABOVE) && ! collect($this->input)->contains(self::NON_OF_THE_ABOVE)) {
            $this->reset_buttons = true;
        }
    }

    public function updatedInput($value)
    {
        if ($this->reset_buttons) {
            $this->input = [self::NON_OF_THE_ABOVE];

            return;
        }
        $this->input = collect($this->input)->filter(fn ($item) => $item != self::NON_OF_THE_ABOVE)->values()->toArray();
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('diets', $this->input);
        $user->save();

        return redirect()->route('causeForm');
    }

    public function back()
    {
        return redirect()->route('shoppingList');
    }

    public function render()
    {
        $options = [
            'organic' => 'Organic',
            'glutenFree' => 'Gluten-free',
            'vegan' => 'Vegan',
            'keto' => 'Keto',
            'paleo' => 'Paleo',
            'vegetarian' => 'Vegetarian',
            'dairyFree' => 'Dairy-free',
            'nutFree' => 'Nut-free',
            'other' => 'Other',
            self::NON_OF_THE_ABOVE => 'None of the above',
        ];

        return view('livewire.screens.diet-form', ['options' => $options])
            ->layout('layouts.app');
    }
}
