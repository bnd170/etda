<?php

namespace App\Orchid\Screens\Predictor;

use App\Models\Predictor\Game;
use App\Services\BackOffice\Predictor\UpdateGameResult;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class GameListScreen extends Screen
{
    public function __construct(
        private readonly UpdateGameResult $updateGameResult
    ) {
    }

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'games' => Game::filters()->defaultSort('date')->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Games';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('games', [
                TD::make('round', 'Round'),
                TD::make('team_home', 'Home')->render(function (Game $game) {
                    return $game->team_home->name.' <img src="https://flagcdn.com/w40/'.strtolower($game->team_home->iso).'.webp"> ';
                })->alignRight(),
                TD::make('score', 'Score')->render(function (Game $game) {
                    return '<h5>'.$game->home_score.' - '.$game->away_score.'</h5>';
                })->alignCenter(),
                TD::make('team_away', 'Away')->render(function (Game $game) {
                    return '<img src="https://flagcdn.com/w40/'.strtolower($game->team_away->iso).'.webp"> '.$game->team_away->name;
                }),
                TD::make('date', 'Date')
                    ->usingComponent(
                                     DateTimeSplit::class,
                        upperFormat: 'Y-m-d',
                        lowerFormat: 'H:i:s',
                        timeZone:    'Europe/Madrid'
                    )
                    ->sort(),
                TD::make('status', 'Status')->render(function (Game $game) {
                    return Game\Status::asHumanReadable($game->status);
                }),
                TD::make('Actions')
                    ->alignRight()
                    ->render(function (Game $game) {
                        return ModalToggle::make('Set result')
                            ->modal('setResultModal', [
                                'gameId' => $game->id,
                            ])
                            ->method('saveGameResult')
                            ->icon('full-screen');
                    }),
            ]),
            Layout::modal(
                'setResultModal',
                Layout::rows(
                    [
                        Group::make(
                            [
                                Input::make('home_score')
                                    ->type('number')
                                    ->title('Home score')
                                    ->required(),
                                Input::make('away_score')
                                    ->type('number')
                                    ->title('Away score')
                                    ->required(),
                            ]
                        ),
                    ]
                )
            )
                ->title('Set game result')
                ->deferred('loadGameResultModal'),
        ];
    }

    public function loadGameResultModal(int $gameId)
    {
        $game = Game::findOrFail($gameId);

        return [
            'game' => $game,
        ];
    }

    public function saveGameResult(Request $request)
    {
        $this->updateGameResult->__invoke(
            $request->get('gameId'),
            $request->get('home_score'),
            $request->get('away_score')
        );

        return redirect()->back();
    }
}
