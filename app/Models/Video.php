<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Video extends Model implements HasMedia, Sortable
{
    use HasFactory;
    use InteractsWithMedia;
    use HasTags;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'video_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    protected $attributes = [];

    protected $appends = [
        'video',
    ];

    public function like()
    {
        return $this->hasOne(Like::class, 'video_id', 'id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->extractVideoFrameAtSecond(1);
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video')->first();
    }

    public function getRelatedRecipes()
    {
        $recipes = $this->tags
            ->reduce(function ($recipes_carry, $tag) {
                $recipes = Recipe::withAnyTags([$tag])->get()->toArray();
                $recipes_carry = array_merge($recipes_carry, $recipes);

                return $recipes_carry;
            }, []);
        $recipes = array_unique($recipes, SORT_REGULAR);

        return $recipes;
    }
}
