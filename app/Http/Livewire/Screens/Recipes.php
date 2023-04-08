<?php

namespace App\Http\Livewire\Screens;

use App\Models\Like;
use App\Models\Recipe;
use App\Models\Video as ModelsVideo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Tags\Tag;

class Recipes extends Component
{
    public function render()
    {
        $recipes = Recipe::all();

        $images = [
            "https://picturetherecipe.com/wp-content/uploads/2020/01/Rogan-Josh-by-PictureTheRecipe-Featured-1-395x500.jpg",
            "data:image/jpeg;base64,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",
            "https://www.simplyrecipes.com/thmb/Rbx5s43hJSYvutdLeN8oMPlt7TU=/1600x1200/smart/filters:no_upscale()/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2015__01__cheesy-bread-horiz-a-1800-505d5b74846a4723a4c8f0221527aeb7.jpg",
            "https://www.seriouseats.com/thmb/BxM9xdsNYW3SCz1Yy3vm8zfbDGI=/450x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__2016__06__20160623-cubano-roast-pork-sandwich-recipe-19-57695d21e77947538db375d1d30b4bdf.jpg",
            "https://www.foodiecrush.com/baked-salmon-creme-fraiche/baked-salmon-with-creme-fraiche-foodiecrush-com-016/",
            "https://www.recipetineats.com/wp-content/uploads/2016/09/Coq-au-Vin_00.jpg?w=747&h=747&crop=1",
            "https://img.jamieoliver.com/jamieoliver/recipe-database/oldImages/large/1571_2_1437661403.jpg?tr=w-800,h-1066",
            "https://www.giverecipe.com/wp-content/uploads/2009/09/imam-bayildi-with-tomato-sauce-360x480.jpg",
            "https://parade.com/wp-content/uploads/2021/07/Watermelon-White-Claw-Grapes-1-1-e1629707978281.jpg",
        ];


        return view('livewire.screens.recipes', [
            'recipes' => $recipes,
            'images' => $images,
        ]);
    }

    public function infoHandler($video_id)
    {
        return redirect()->route('recipe', ['recipe_id' => $video_id]);
    }
}