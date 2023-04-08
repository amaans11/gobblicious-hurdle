<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CauseForm extends Component
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
        $this->input = Auth::user()->data->get('cause', []);
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
        $user->data->put('cause', $this->input);
        $user->save();

        return redirect()->route('surveyCompleted');
    }

    public function back()
    {
        return redirect()->route('dietForm');
    }

    public function render()
    {
        $options = [
            'animalWelfare' => 'Animal welfare',
            'foodAccess' => 'Food access',
            'carbonImpact' => 'Carbon impact',
            'fairTrade' => 'Fair trade',
            'sustainableSourcing' => 'Sustainable sourcing',
            'organic/non-GMO' => 'Organic / non-GMO',
            'noArtificialIngredients' => 'No artificial ingredients',
            'regenerativeAgriculture' => 'Regenerative agriculture',
            'other' => 'Other',
            self::NON_OF_THE_ABOVE => 'None of the above',
        ];

        return view('livewire.screens.cause-form', ['options' => $options])
            ->layout('layouts.app');
    }
}
