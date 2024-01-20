<?php

namespace App\Orchid\Resources;

use App\Models\Season;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
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
                    Relation::make('season_id')
                        ->title('Season')
                        ->fromModel(Season::class, 'year'),
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
            Group::make(
                [
                    Quill::make('description')
                        ->title('Description')
                        ->toolbar(["text", "color", "header", "quote", "list", "format"]),
                    Cropper::make('logo_id')
                        ->title('Logo')
                        ->width(366)
                        ->height(366)
                        ->maxCanvas(366)
                        ->targetId(),
                ]
            ),
            Cropper::make('cover_id')
                ->title('Cover')
                ->width(1900)
                ->height(1200)
                ->targetId(),
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
            TD::make('season_id', 'Season')
                ->render(function ($model) {
                    return $model->season->year;
                }),

        ];
    }

    public function rules(Model $model): array
    {
        return [
            'name'        => 'required',
            'tag'         => 'required|max:3',
            'city'        => 'required',
            'coach'       => 'max:255',
            'president'   => 'max:255',
            'description' => 'max:3000',
            'season_id'   => 'required|exists:seasons,id',
            'logo_id'     => 'required|exists:attachments,id',
            'cover_id'    => 'nullable|exists:attachments,id',
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
        return [
            new DefaultSorted('name', 'asc'),
        ];
    }
}
