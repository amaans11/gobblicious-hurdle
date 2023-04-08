<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;
use Spatie\Tags\Tag;

class TagType extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public function apply(Request $request, $query, $value)
    {
        return $query->withAllTagsOfAnyType($value);
    }

    public function options(Request $request)
    {
        $tags = Tag::all();

        return $tags->map(function ($tag) {
            return [
                'name' => $tag->name,
                'value' => $tag->name,
            ];
        });
    }
}
