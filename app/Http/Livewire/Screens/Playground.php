<?php

namespace App\Http\Livewire\Screens;

use App\Models\Like;
use App\Models\Video as ModelsVideo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Tags\Tag;

class Playground extends Component
{
    public string $selectedTag = '';

    public function render()
    {

        return view('livewire.screens.playground', [
        ]);
    }
}
