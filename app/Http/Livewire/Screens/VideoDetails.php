<?php

namespace App\Http\Livewire\Screens;

use App\Models\Video;
use Livewire\Component;

class VideoDetails extends Component
{
    public $video_id = '';

    public function mount($id)
    {
        $this->video = Video::find($id);
    }

    public function render()
    {

        // Todo: Amaan

        return view('livewire.screens.video-details', [
            'video' => $this->video,
            'recipes' => $this->video->getRelatedRecipes(),
        ]);
    }

    public function viewRecipe($id)
    {
        return redirect()->route('recipe', ['recipe_id' => $id]);
    }
}
