<?php

namespace App\Http\Livewire\Screens;

use App\Models\Recipe;
use Livewire\Component;

class RecipeDetails extends Component
{
    public $recipe_id = '';

    public function mount($recipe_id)
    {
        $this->recipe_id = $recipe_id;
    }

    public function render()
    {
        $recipe_detail = Recipe::with('ingredients')->find($this->recipe_id);

        return view('livewire.screens.recipe-details', [
            'recipe' => $recipe_detail,
        ])->layout('layouts.app');
    }
}
