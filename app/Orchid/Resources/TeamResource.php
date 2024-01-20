<?php

namespace App\Orchid\Resources;

use App\Models\Team;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\TD;

class TeamResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Team::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('sheet_name')
                ->readonly()
                ->title('Sheet Name')
                ->help('This field is user to match info from Google Sheets.'),
            Group::make(
                [
                    Input::make('name')
                        ->title('Name'),
                    Input::make('tag')
                        ->title('Tag'),
                ]
            ),
            Group::make(
                [
                    Input::make('coach')
                        ->title('Coach'),
                    Input::make('president')
                        ->title('President'),
                ]
            ),
            Input::make('city')
                ->title('City')
                ->placeholder('City'),
            TextArea::make('description')
                ->title('Description'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('tag', 'Tag'),
            TD::make('name', 'Name'),
            TD::make('players', 'Players')
                ->render(function ($model) {
                    return $model->players->count();
                }),

        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
