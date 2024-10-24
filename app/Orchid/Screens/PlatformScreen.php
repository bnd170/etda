<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Predictor\Prediction;
use App\Models\User;
use App\Orchid\Layouts\Predictor\PredictionsChartLayout;
use App\Orchid\Layouts\User\UsersChartLayout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'registrations' => [User::countByDays()->toChart('Users')],
            'predictions'   => [Prediction::countByDays()->toChart('Predictions')],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Control panel';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Welcome to the control panel';
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::columns(
                [
                    UsersChartLayout::make('registrations', 'New registrations'),
                    PredictionsChartLayout::make('predictions', 'New predictions'),
                ]
            ),
        ];
    }
}
