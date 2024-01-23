<?php

namespace App\Orchid\Resources;

use App\Models\Player;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;

class PlayerResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Player::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make(
                [
                    Input::make('name')
                        ->title('Name'),
                    Input::make('surname')
                        ->title('Surname'),
                    Input::make('age')
                        ->title('Age'),
                ]
            ),
            Group::make(
                [
                    Input::make('classification')
                        ->title('Classification')
                        ->placeholder('FT1'),
                    Input::make('number')
                        ->title('Number')
                        ->placeholder('Number'),
                    Select::make('position')
                        ->options([
                                      'Delantero'   => 'Delantero',
                                      'Mediocentro' => 'Mediocentro',
                                      'Defensa'     => 'Defensa',
                                      'Portero'     => 'Portero',
                                  ])
                        ->title('Select position'),
                ]
            ),
            Group::make(
                [
                    Quill::make('description')
                        ->title('Description')
                        ->toolbar(["text", "color", "header", "quote", "list", "format"]),
                    Cropper::make('image_id')
                        ->title('Image')
                        ->width(250)
                        ->height(300)
                        ->maxCanvas(250)
                        ->targetId(),
                ]
            ),
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
            TD::make('number', '#')->width('20px'),
            TD::make('clasification', 'Class')->width('20px'),
            TD::make('surname'),
            TD::make('name'),
            TD::make('team_id', 'Team')
                ->render(function (Player $player) {
                    return $player->team->name;
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
        return [
            new DefaultSorted('team_id', 'asc'),
        ];
    }
}
