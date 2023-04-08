<?php

namespace App\Http\Livewire\Screens;

use App\Models\Like;
use App\Models\Video as ModelsVideo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Tags\Tag;

class Video extends Component
{
    public $search = '';
    public $selectedTag = '';
    public $searchResults = [];

    public function updatedSearch($newValue)
    {
        $this->searchResults = [];

        Tag::all()->map(function ($tag) {
            if (Str::contains($tag, $this->search)) {
                array_push($this->searchResults, $tag->name);
            }
        });
    }

    public function setValue($value)
    {
        $this->selectedTag = $this->searchResults[$value];
        $this->search = '';
    }

    public function render()
    {
        $videos = $this->selectedTag ? ModelsVideo::withAnyTags([$this->selectedTag])->get() : ModelsVideo::all();

        $tags = Tag::all();

        return view('livewire.screens.video', [
            'videos' => $videos,
            'tags' => $tags,
        ]);
    }

    public function likeVideo($video_id)
    {
        $user = Auth::user();

        $is_video = Like::where('user_id', $user->id)->where('video_id', $video_id)->first();

        if ($is_video) {
            $is_video->delete();
        } else {
            $like_video = new Like();

            $like_video->user_id = $user->id;
            $like_video->video_id = $video_id;

            $like_video->save();
        }
    }

    public function infoHandler($video_id)
    {
        return redirect()->route('videoDetails', ['id' => $video_id]);
    }
}
