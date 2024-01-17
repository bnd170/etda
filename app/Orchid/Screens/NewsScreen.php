<?php

namespace App\Orchid\Screens;

use App\Models\News;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class NewsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'news' => News::paginate(),
        ];
    }

    public function create(Request $request)
    {
        // Validate form data, save task to database, etc.
        $request->validate(
            [
                'news.title'   => 'required|max:255',
                'news.content' => 'required|max:255',
                'news.cover'   => 'required|max:255',
            ]
        );

        $task          = new News();
        $task->title   = $request->input('news.title');
        $task->content = $request->input('news.content');
        $task->cover   = $request->input('news.cover');
        $task->save();
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'News';
    }

    public function description(): ?string
    {
        return 'From here you can manage the news';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add News')
                ->modal('newsModal')
                ->method('create')
                ->icon('plus'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('news', [
                TD::make('title', 'Title'),
            ]),
            Layout::modal(
                'newsModal',
                Layout::rows(
                    [
                        Input::make('news.title')
                            ->title('Title')
                            ->placeholder('News title')
                            ->help('Enter the news title.'),
                        Input::make('news.content')
                            ->title('Content')
                            ->placeholder('News content')
                            ->help('Enter the news content.'),
                        Input::make('news.cover')
                            ->title('Cover')
                            ->placeholder('News cover')
                            ->help('Enter the news cover.'),
                    ]
                )
            )
                ->title('Create Task')
                ->applyButton('Add Task'),
        ];
    }
}
