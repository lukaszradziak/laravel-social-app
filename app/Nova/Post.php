<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Add to index query
     * 
     * @param NovaRequest $request 
     * @param Builder $query 
     * @return Builder 
     * @throws InvalidArgumentException 
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withCount(['likers', 'hashtags']);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make(__('Content'))
                ->displayUsing(function ($content) {
                    return Str::limit($content, 50);
                })
                ->onlyOnIndex(),

            Textarea::make(__('Content'), 'content')
                ->sortable()
                ->alwaysShow(),

            BelongsTo::make(__('User'), 'user', User::class)
                ->sortable(),

            Text::make(__('Likes'), 'likers_count', function () {
                return $this->likers_count;
            })
                ->exceptOnForms()
                ->sortable(),

            Text::make(__('Hashtags'), 'hashtags_count', function () {
                return $this->hashtags_count;
            })
                ->onlyOnIndex()
                ->sortable(),

            BelongsToMany::make(__('Hashtags'), 'hashtags', Hashtag::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
