<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Tags\Tag;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = Tag::all()->map(function ($tag) {
            return $tag->name;
        })->toArray();

        return [
            'title' => $this->faker->unique()->company(),
            'description' => $this->faker->realText(200),
            'tags' => [$tags[array_rand($tags)], $tags[array_rand($tags)]],

        ];
    }

    /*
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Video $video) {
            $video->addMediaFromUrl('https://www.videvo.net/video/close-up-shot-rain-drops-falling-on-leaves/783004/')->toMediaCollection('video');
        });
    }
}
