<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;
use App\Models\Asset;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;


class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Course>
     */
    public static $model = \App\Models\Course::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hideFromIndex()->hideFromDetail(),
            Text::make('Title')->sortable(),
            Slug::make('Slug')->from('Title')->separator('-')->hideFromIndex(),
            Image::make('Featured Image')->disk('public')->prunable(),
            Select::make('Status')
            ->options([
                'draft' => 'Draft',
                'published' => 'Published',
                'Closed' => 'Closed'
            ]),
            Select::make('Type')
            ->options([
                'healing-school' => 'Healing School',
                'mentorship' => 'Eagle\'s Spot', 
                'seer-school' => 'Seer School', 
                'e-course' => 'E-Course', 
            ])
            ->displayUsingLabels()
            ->rules('required'), 
            Textarea::make('Description'),
            HasMany::make('Assets', 'assets', \App\Nova\Asset::class)->sortable(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}